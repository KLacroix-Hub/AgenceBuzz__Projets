<?php get_header();

		while (have_posts()):
				the_post();
				$agenda = new Agenda($post);
		
				
		endwhile;
		
		get_footer();
		