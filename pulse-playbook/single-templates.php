<?php get_header();

		while (have_posts()):
				the_post();
				$templates = new Templates($post);
		
				
		endwhile;
		
		get_footer();
		