<?php /*
Template Name: Modèle - Menu
*/

global $post;
$child_pages = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if($child_pages):
	$firstchild = $child_pages[0];
	wp_redirect(get_permalink($firstchild->ID));
	exit();
endif;

get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);
	$parent = $page->get_parent();

	/** Hero */
	View::show('organismes/o-hero', ['page' => $page, 'parent' => $parent]);

	$query_child = ($parent) ? $parent->query_child() : $page->query_child();
	$view_menu = false;
	if($query_child->have_posts()) : 
		$active = ($parent) ? $active = $page : $active = $query_child->crocus[0];
		$view_menu = View::get('organismes/o-children-menu', ['query' => $query_child, 'active' => $active]);
	endif; 

	?>

	<div class="grid sm:grid-cols-24 tpl-menu__head">
        <div class="sm:col-span-<?php echo ($view_menu) ? '1' : '3' ?>"></div>
		
		<?php if($view_menu) : ?>
			<div class="sm:col-span-6">
				<?php View::show('organismes/o-flexs', ['page' => ($parent ? $parent : $page)]); ?>
				<?php echo $view_menu ?>
			</div>
			<div class="sm:col-span-1"></div>
		<?php endif; ?>

		<div class="sm:col-span-<?php echo ($view_menu) ? '14' : '18' ?>">
			<?php View::show('organismes/o-flexs', ['page' => $page]); ?>
		</div>
	</div>

	<?php

	/** ON affiche les contenue lié */
	View::show('organismes/o-page-related', ['page' => ($parent ? $parent : $page)]);

endwhile;

get_footer();