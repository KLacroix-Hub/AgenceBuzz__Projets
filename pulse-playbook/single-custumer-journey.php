<?php get_header();

	while (have_posts()):
		the_post();
		$custumer_journey = new Custumer_Journey($post);

		/** Hero */
		$sub_view = View::get('molecules/m-customer-journey-hero', ['post' => $custumer_journey]);
		View::show('organismes/o-hero', ['page' => $custumer_journey, 'sub_view' => $sub_view]);
		
		/** Stage */
		View::show('organismes/o-customer-journey-stages', [ 'post' => $custumer_journey ]);
			
	endwhile;
	
	get_footer();
		