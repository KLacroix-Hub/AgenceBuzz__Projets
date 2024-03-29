<?php
class Custumer_Journey extends Post
{
	const POST_TYPE = "custumer-journey";
	const VIEW_THUMB = 'molecules/m-custumer-journey-thumb';

	public static function API_get_journey(WP_REST_Request $request){

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
				$response.= View::get('molecules/m-custumer-journey-thumb', ['post' => $persona]); 

			}
		}

		wp_send_json_success([
			'tpl' => $response
		]);

		return;

	}

	public static function get_stage_step_type()
    {
        return get_field_object('field_60116b2fda146');
    }

}