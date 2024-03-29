<?php /*
Template Name: Page - Customer Insights
*/

get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);

	/** Hero */
	View::show('organismes/o-hero', ['page' => $page, 'class_css' => 'o-hero--has-m-filtres-pages']);
	View::show('molecules/m-filtres-pages', ['page' => $page, "class_css" => "b-radius-30"]); ?>
    
    <div class="grid sm:grid-cols-24 gap-20">

        <div class="sm:col-span-3"></div>
        <div class="sm:col-span-18">

			<?php View::show('organismes/o-flexs', ['page' => $page]); ?>
            
			<?php $query_children = $page->query_child_of_child(); ?>

			<div id="result" class="js-list-container">
				<?php View::show('organismes/o-pages-list', ['query' => $query_children]); ?>
			</div>
			
        </div>
		<div class="sm:col-span-3"></div>

    </div>
	
<?php
endwhile;

get_footer();