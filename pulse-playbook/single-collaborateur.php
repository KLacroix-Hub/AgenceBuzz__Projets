<?php get_header();

		while (have_posts()):
				the_post();
				$collaborateur = new Collaborateur($post);
		
				
		endwhile;
		
		get_footer();
		