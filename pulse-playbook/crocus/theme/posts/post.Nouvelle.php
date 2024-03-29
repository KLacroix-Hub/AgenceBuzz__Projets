<?php
class Nouvelle extends Post
{
	const POST_TYPE = "nouvelle";

	public static function get_last(){

		$lastnouvelletime = isset($_COOKIE['lastnouvelletime']) ? $_COOKIE['lastnouvelletime'] : false;
		$lastnouvelle = false;
		$query = self::query([
			'orderby' => 'modified',
			'posts_per_page' => 1
		]);

		if($query->have_posts()){
			$lastnouvelle = $query->crocus[0];
		}


		if($lastnouvelle){
			
			if(!$lastnouvelletime) return $lastnouvelle;
			if($lastnouvelletime < $lastnouvelle->get_modified_time()) return $lastnouvelle;
			
		}

		return false;

	}

	public function get_modified_time(){
		return get_post_modified_time('U', false, $this->wp->ID);
	}

}