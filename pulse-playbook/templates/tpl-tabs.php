<?php /*
Template Name: Modèle - Tabs
*/

get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);
	$parent = $page->get_parent();

	/** Hero */
	View::show('organismes/o-hero', ['page' => $page, 'parent' => $parent]);

	?>

	<div class="grid sm:grid-cols-24">
		<div class="sm:col-span-4"></div>
		<div class="sm:col-span-16">
			<?php View::show('organismes/o-flexs', [
				'page' => ($parent ? $parent : $page),
				'class_css' => 'g-no-margin-b'
				]); ?>
		</div>
		<div class="sm:col-span-4"></div>
	</div>

	<?php
	
	/** ON affiche les contenue lié */
	View::show('organismes/o-page-related', ['page' => ($parent ? $parent : $page)]);

endwhile;

get_footer();