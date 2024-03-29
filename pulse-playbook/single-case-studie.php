<?php 
get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);

	/** Hero */
	View::show('organismes/o-hero-case-studies', ['page' => $page]);

	?>

	<div class="grid sm:grid-cols-24">
        <div class="sm:col-span-3"></div>
		<div class="sm:col-span-18">
			<?php View::show('organismes/o-flexs', ['page' => $page]); ?>
		</div>
	</div>

	<?php

	$front_page = Page::find_front();
	View::show('organismes/o-home-cases-studies', ['page' => $front_page, 'ignore' => [$page->wp->ID]]);

endwhile;

get_footer();