<?php
class Agenda extends Post
{
	const POST_TYPE = "agenda";
    const VIEW_THUMB = 'molecules/m-agenda-thumb';

	public static function query_incoming($type = 'all')
    {
		$meta_query = [
            [
                'key' => 'agenda_date_start',
                'value' => date('Ymd'),
                'type' => 'DATE',
                'compare' => '>=',
            ],
        ];
		
		
        $args = [
			'posts_per_page' => 5,
            'order' => 'DESC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'agenda_date_start',
            'meta_query' => $meta_query,
        ];
		
		if($type != 'all'){
			$args['tax_query'] = [
				[
				  'taxonomy' => 'type-evenement',
				  'field'    => 'slug',
				  'terms'    => $type,
				],
			];
		}
		
		return self::query($args);


    }

	public static function API_get_by_type(WP_REST_Request $request){

		$slug_cat = $request->get_param('slug_cat');

        if (!$slug_cat) {
            wp_send_json_error();
			return;
        }

		$query = self::query_incoming($slug_cat);
		$response = '';
		if($query->have_posts()){
			foreach ($query->crocus as $evenement) {
				$response.= $evenement->get_view_thumb();
			}
		}else{
            $response = '<p>No pulse event</p>';
        }

		wp_send_json_success([
			'tpl' => $response
		]);

		return;

	}

	public function is_past(){

		if($this->acf->agenda_date_end){
			return (strtotime($this->acf->agenda_date_end) < time());
		}

		strtotime($this->acf->agenda_date_start) < time();
	}

    public function get_formated_dates()
    {
        $date_debut = strtotime($this->acf->agenda_date_start);
        $date_fin = strtotime($this->acf->agenda_date_end);
        if ($date_debut == $date_fin) {
            return date_i18n('d F Y', $date_debut);
        }

        $mois_debut = date_i18n('M', $date_debut);
        $mois_fin = date_i18n('M', $date_fin);

        $date = '';
        if ($mois_debut == $mois_fin) {
            return ' ' .
                date_i18n('d', $date_debut) .
                ' ' .
                __('au', 'wami') .
                ' ' .
                date_i18n('d M Y', $date_fin);
        }

        return date_i18n('d M', $date_debut) .
            ' ' .
            __('au', 'wami') .
            ' ' .
            date_i18n('d M Y', $date_fin);
    }


}