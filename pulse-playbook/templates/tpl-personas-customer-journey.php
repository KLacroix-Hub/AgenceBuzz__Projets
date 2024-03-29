<?php /*
Template Name: Page - Personas & Customer journey
*/

while (have_posts()):
	the_post();
	$page = new Page($post);

	$child_pages = get_pages("child_of=".$page->wp->ID."&sort_column=menu_order");
	$firstchild = $child_pages[0];
	wp_redirect(get_permalink($firstchild->ID));
	die();

endwhile;