<?php get_header();

		while (have_posts()):
				the_post();
				$nouvelle = new Nouvelle($post);
		
				
		endwhile;
		
		get_footer();
		