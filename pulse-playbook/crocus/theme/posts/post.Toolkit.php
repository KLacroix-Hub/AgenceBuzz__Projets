<?php
class Toolkit extends Post
{
	const POST_TYPE = "toolkit";
	const VIEW_THUMB = 'molecules/m-toolkit-thumb';

	public static function query_by_cat($cats = [], $posts_per_page = 3, $post__not_in = []){
		$args = [
			'posts_per_page' => $posts_per_page,
			'post__not_in' => $post__not_in
        ];
		
		if(count($cats)){
			$args['tax_query'] = [
				[
				  'taxonomy' => 'categorie-toolkit',
				  'field'    => 'slug',
				  'terms'    => $cats,
				],
			];
		}

		return self::query($args);
	}

	public static function API_get_toolkits(WP_REST_Request $request){

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
			foreach ($query->crocus as $publication) {
				$response.= $publication->get_view_thumb(['type' => 'small']);
			}
		}

		wp_send_json_success([
			'tpl' => $response
		]);

		return;

	}

}