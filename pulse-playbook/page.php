<?php 
get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);

	/** Hero */
	View::show('organismes/o-hero', ['page' => $page]);


	?>

	<div class="grid sm:grid-cols-24">
        <div class="sm:col-span-3"></div>
		<div class="sm:col-span-18">
			<?php View::show('organismes/o-flexs', ['page' => $page]); ?>
		</div>
	</div>

	<?php

	/** ON affiche les contenue lié */
	View::show('organismes/o-page-related', ['page' => $page]);

endwhile;

get_footer();