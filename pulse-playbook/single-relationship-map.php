<?php get_header();

		while (have_posts()):
				the_post();
				new Relationship_Map($post);
		
				
		endwhile;
		
		get_footer();
		