<?php
/**************************************************************
 *
 * Class pour la des posts en front
 *
 **************************************************************/

class Post
{
    const POST_TYPE = 'post';
    const VIEW_THUMB = false;
    public $wp;
    public $acf;
    private $permalink;

    /**
     * Contruct
     */
    public function __construct($post)
    {
        if ($post !== null) {
            $this->wp = $post;
            $this->acf = new Post_Acf($post->ID);
        } else {
            $this->wp = new \stdClass();
            $this->acf = new Post_Acf(false);
        }
    }

    public function get_permalink()
    {
        if ($this->permalink) {
            return $this->permalink;
        }
        $this->permalink = get_permalink($this->wp->ID);
        return $this->permalink;
    }

    public function get_excerpt($longueur = 250)
    {
        $extrait = get_the_excerpt($this->wp->ID)
            ? get_the_excerpt($this->wp->ID)
            : get_the_content($this->wp->ID);
        $monextrait = strip_tags($extrait);
        $monextrait = strip_shortcodes($monextrait);
        if (strlen($monextrait) > $longueur) {
            $monextrait = substr($monextrait, 0, $longueur);
            $monextrait =
                substr($monextrait, 0, strrpos($monextrait, ' ')) . ' ...';
        }
        return $monextrait;
    }

    /**
     * Ancienne fonction. pour la retrocompapilité
     */
    public static function query_all($args = false)
    {
        return self::query($args);
    }

    /**
     * Récupère tous les posts sous forme de query wp
     * Possible de mettre en argument la query qu'on veux.
     */
    public static function query($args = false)
    {
        if (!isset($args['post_type'])) {
            $args['post_type'] = static::POST_TYPE;
        }
        if (!isset($args['post_status'])) {
            $args['post_status'] = 'publish';
        }
        // if (!isset($args['orderby'])) {
        //     $args['orderby'] = 'rand';
        // }

        $query = new WP_Query($args);
        $query->miwa_posts = false;
        if ($query->have_posts()) {
            $query->miwa_posts = array_map(function ($post) {
                return new static($post);
            }, $query->get_posts());
        }
        $query->crocus = $query->miwa_posts;
        return $query;
    }

    public function get_the_date($format = 'd/m/Y')
    {
        return get_the_date($format, $this->wp->ID);
    }

    public static function query_last(
        $posts_per_page = 4,
        $post__not_in = false
    ) {
        $args = [
            'orderby' => 'date',
            'posts_per_page' => $posts_per_page,
        ];
        if ($post__not_in) {
            $args['post__not_in'] = $post__not_in;
        }

        return self::query($args);
    }

    public function get_taxonomies(){
        return get_post_taxonomies($this->wp->ID);
    }

    public static function find_one($id, $force_lang = false)
    {
        $args = [
            'p' => $id,
            'post_type' => static::POST_TYPE,
            'posts_per_page' => 1,
        ];

        if ($force_lang !== false) {
            $args['lang'] = $force_lang;
        }

        $query = new \WP_Query($args);
        if ($query->have_posts()) {
            return new static($query->get_posts()[0]);
        }
        return false;
    }

    public function get_terms($taxonomy = 'category')
    {
        $terms = get_the_terms($this->wp->ID, $taxonomy);
        if (!$terms) {
            return false;
        }
        $terms = array_map(function ($term) {
            return new Term($term);
        }, $terms);

        return $terms;
    }

    /**
     * Récuper les url des paterns de bloc
     * Deux taille possible : grande / petite
     */
    public function get_page_patterns($type, $size){
        $page_patterns = $this->acf->page_patterns;
        if(!$page_patterns) return Image::get_url_from_theme('pattern-default-' . $type . '.png');
        $background = $page_patterns[$type];
        if(!$background) return Image::get_url_from_theme('pattern-default-' . $type . '.png');

        return Image::get_url($background, $size);

    }

    public function show_view_thumb($params = []){
        $params = array_merge(['publication' => $this], $params);
        View::show(static::VIEW_THUMB, $params);
    }

    public function get_view_thumb($params = []){
        $params = array_merge(['publication' => $this], $params);
        return View::get(static::VIEW_THUMB, $params);
    }

    /**
     * Sauvegarder/updater l'article
     */
    public function save()
    {
        $this->wp->post_type = static::POST_TYPE;
        if (!isset($this->wp->post_author)) {
            $this->wp->post_author = 1;
        }
        $post_id = wp_insert_post($this->wp);
        $this->wp->ID = $post_id;
        $this->acf->post_id = $post_id;
        $this->acf->save();

        return $post_id;
    }
}
