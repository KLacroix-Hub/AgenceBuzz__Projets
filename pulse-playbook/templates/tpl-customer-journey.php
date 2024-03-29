<?php /*
Template Name: Page - Customer Journey
*/

get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);
    $parent = $page->get_parent();

	/** Hero */
    $query_sibling = $page->query_sibling();
    $tabs_view = View::get('molecules/m-hero-tabs', ['query_sibling' => $query_sibling, 'current_page' => $page]); 
	View::show('organismes/o-hero', ['page' => $parent, 'sub_view' => $tabs_view]); ?>
    
    <div class="grid sm:grid-cols-24 gap-20">

        <div class="sm:col-span-2"></div>
        <div class="sm:col-span-20">
			<?php 
            /** Liste des Custumer Journey */
            $query = Custumer_Journey::query(['posts_per_page' => -1]);
            View::show('organismes/o-liste-personas-journey', [
                'query' => $query,
                'page' => $page,
                'cols' => '3',
            ]);
            ?>
        </div>

    </div>
	
<?php
endwhile;

get_footer();