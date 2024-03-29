<?php
/**************************************************************
 *
 * Class pour la des posts en front
 *
 **************************************************************/

class Page extends Post
{
    const POST_TYPE = 'page';
    const VIEW_THUMB = 'molecules/m-page-thumb';
    public $parent = false;
    public $sibling;

    public static function get_global(){
        global $post;
        return new Page($post);
    }

    /**************************************************************
     * Affichage
     **************************************************************/

    public static function API_get_child_tab(WP_REST_Request $request){

		$id = $request->get_param('id');

        if (!$id) {
            wp_send_json_error();
			return;
        }

		$page = self::find_one($id);
		$response = '';
		if($page){
            $response.= View::get('molecules/m-child-tab', ['page' => $page]);
		}

		wp_send_json_success([
			'tpl' => $response
		]);

		return;

	}

    public static function API_get_question(WP_REST_Request $request){

        $body = $request->get_body();

        if (!$body) {
            wp_send_json_error();
			return;
        }

        $datas = json_decode($body);
        if(!$datas->index || !$datas->page){
            wp_send_json_error();
			return;
        }
        
        $page = Page::find_one($datas->page);
        
        if(!$page){
            wp_send_json_error();
			return;
        }
        
        $questionnaire = $page->acf->page_questionnaire;
        $response = Helper::find_value_in_nested_array($questionnaire, $datas->index, 'identifiant');
        $questionnaire = $response['sous_reponse'];


        $pages_id = [];
        foreach ($questionnaire['reponses'] as $key => $reponse) {
            if($reponse['pages']) $pages_id = array_merge($pages_id, $reponse['pages']);
        }
        
        $query = self::query([
            'post__in' => $pages_id
        ]);

		$tpl_list = '';

		if($query->have_posts()){
            $tpl_list.= View::get('organismes/o-pages-list', ['query' => $query]);
		}

        $tpl = View::get('atomes/a-filtre-pages', [
            'question' => $questionnaire['question'],
            'reponses' => $questionnaire['reponses'],
            'page' => $page
        ]);

		wp_send_json_success([
			'tpl' => $tpl,
            'tpl_list' => $tpl_list
		]);

		return;

    }

    public static function API_get_pages_by_ID(WP_REST_Request $request){

        $body = $request->get_body();

        if (!$body) {
            wp_send_json_error();
			return;
        }

        $datas = json_decode($body);
        if(!$datas->pages || !$datas->page){
            wp_send_json_error();
			return;
        }
        
        $tpl_filtre = false;
        if($datas->filtres) {
            $tpl_filtre = View::get('atomes/a-filtre-pages', [
                'question' => 'Your filters :', 
                'reponses' => false,
                'filtres' => $datas->filtres
            ]);
            
        }

        $query = false;
        
        if($datas->pages == 'all'){
            $page = Page::find_one($datas->page);
            $query = $page->query_child_of_child();			

        }else{

            $pages = explode('|', $datas->pages);
            $query = self::query([
                'post__in' => $pages
            ]);
        }

		$response = '';

		if($query->have_posts()){
            $response.= View::get('organismes/o-pages-list', ['query' => $query]);
		}

		wp_send_json_success([
			'tpl' => $response,
            'tpl_filtre' => $tpl_filtre,
		]);

		return;

	}


    /**************************************************************
     * Requettes
     **************************************************************/

    public function get_parent()
    {
        if ($this->parent) {
            return $this->parent;
        }

        $ancestors = get_post_ancestors($this->wp->ID);
        if (count($ancestors) === 0) {
            return false;
        }

        $this->parent = parent::find_one($ancestors[0]);
        return $this->parent;
    }

    public function query_sibling()
    {
        if($this->sibling != null) return $this->sibling;
        
        $ancestors = get_post_ancestors($this->wp->ID);
        if (count($ancestors) === 0) {
            return false;
        }

        $args = [
            'post_type' => 'page',
            'post_parent' => $ancestors[0],
            'wpse_include_parent' => true,
            'order' => 'ASC',
            'orderby' => 'menu_order',
        ];

        $this->sibling = self::query($args);
        return $this->sibling;

    }

    public function query_child_of_child(){

        $children = $this->query_child();
        $pages = [];
        foreach ($children->crocus as $key => $publication) {
            $query_children_of_child = $publication->query_child();
            if($query_children_of_child->have_posts()){
                foreach ($query_children_of_child->crocus as $key => $child) {
                    $pages[] = $child->wp->ID;
                }
            }
        }

        return self::query([
            'post__in' => $pages
        ]);

    }

    public function query_child($limit = -1)
    {
        $args = [
            'post_type' => 'page',
            'post_parent' => $this->wp->ID,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'posts_per_page' => $limit,
        ];

        return self::query($args);
    }

    public static function find_front(){
        $front_page_id = get_option('page_on_front');
        return self::find_one($front_page_id);
    }

}
