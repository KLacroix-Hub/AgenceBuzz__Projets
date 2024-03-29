<?php get_header();

		while (have_posts()):
				the_post();
				$service = new Service($post);
		
				
		endwhile;
		
		get_footer();
		