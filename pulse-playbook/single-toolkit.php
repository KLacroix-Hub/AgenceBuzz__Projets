<?php get_header();

		while (have_posts()):
				the_post();
				$toolkit = new Toolkit($post);
		
				
		endwhile;
		
		get_footer();
		