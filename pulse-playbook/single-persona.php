<?php get_header();

	while (have_posts()):
		the_post();
		$persona = new Persona($post);

		/** Hero */
		View::show('organismes/o-hero', ['page' => $persona, 'variation' => 'small']);

		/** On affiche le contenu Pulse ou Community */
		$type = $persona->get_type_slug();
		View::show('organismes/o-persona-' . $type, ['persona' => $persona]);
			
	endwhile;

get_footer();
		