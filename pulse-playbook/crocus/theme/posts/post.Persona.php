<?php

class Persona extends Post
{
	const POST_TYPE = "persona";
    const VIEW_THUMB = 'molecules/m-persona-thumb';

	public static function API_get_personas(WP_REST_Request $request){

		$form_data = $request->get_body('filters');
		if(!$form_data){
			wp_send_json_error();
			return;
		}

		$filters = json_decode($form_data);
		$taxonomy_query = ['relation' => 'AND'];

		foreach ($filters as $key => $terms) {
			foreach ($terms as $taxonomy => $terms) {
				if(count($terms)){
					$taxonomy_query[][] = [
						'taxonomy' => $taxonomy,
						'terms' => $terms,
						'operator' => 'IN',
						'include_children' => false
					];
				}
			}

		}

		$query_args = [
			'posts_per_page' => -1,
			'tax_query' => $taxonomy_query,
		];

		$query = self::query($query_args);
		$response = '';

		if($query->have_posts()){
			foreach ($query->crocus as $persona) {
				$response.= $persona->get_view_thumb();
			}
		}

		wp_send_json_success([
			'tpl' => $response
		]);

		return;

	}

    public function get_photo_url($size = 'petite'){
        $photo = $this->wp->persona_photo;
        if (!$photo) return Image::get_url_from_theme('persona-default.png');
        return Image::get_url($photo, $size);
    }

	public function get_type_slug() {
        $type = $this->acf->persona_type;
        if (!$type) return false;
        return $type->wp->slug;
    }

	public static function query_by_custumer_group($custumer_group, $post__not_in = [], $posts_per_page = -1) {
        return self::query([
            'posts_per_page' => $posts_per_page,
            'post__not_in' => $post__not_in,
            'tax_query' => [
                [
                    'taxonomy' => 'custumer-groupe',
                    'field' => 'slug',
                    'terms' => $custumer_group,
                ],
            ],
        ]);
    }

	public static function query_by_custumer_journey($custumer_journey,$post__not_in = [],$posts_per_page = -1) {
        return self::query([
            'posts_per_page' => $posts_per_page,
            'post__not_in' => $post__not_in,
            'meta_query' => [
                [
                    'key' => 'persona_customer_journey',
                    'value' => $custumer_journey,
                ],
            ],
        ]);
    }


	public static function query_by_location($location, $post__not_in = [])
    {
        return self::query([
            'posts_per_page' => -1,
            'post__not_in' => $post__not_in,
            'tax_query' => [
                [
                    'taxonomy' => 'location-comunity',
                    'field' => 'slug',
                    'terms' => $location,
                ],
            ],
        ]);
    }

	public function show_metas($meta_type)
    {
        if ($metas = $this->acf->$meta_type) {
            foreach ($metas as $meta) {
                echo $meta->wp->name . ' ';
            }
        } else {
            echo '-';
        }
    }


}