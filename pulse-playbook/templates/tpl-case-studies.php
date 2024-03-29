<?php /*
Template Name: Page - Case studies
*/

get_header();

while (have_posts()):
	the_post();
	$page = new Page($post);

	/** Hero */
	View::show('organismes/o-hero', ['page' => $page]); ?>
	<?php 
		$filtre = Router::get('cat');
	?>

	<div class="grid sm:grid-cols-24 c-theme c-theme--blue-dark">

		<div class="sm:col-span-2"></div>

		<div class="sm:col-span-6">
			<?php
				/** Filtres */
				View::show('organismes/o-filtres', [
					'type' => 'case-studies',
					'taxos' => [
						[
							'titre' => 'Categories',
							'class' => 'Categorie_Casestudie',
							'selected' => $filtre
						]
					]
				]);
			?>
		</div>

		<div class="sm:col-span-1"></div>

		<div class="sm:col-span-13">

			<?php View::show('organismes/o-flexs', ['page' => $page]); ?>

			<div class="js-post-container g-flex g-flex--gap">
				<?php 
				/** Liste des case studies */
				$cats = [];
				if($filtre) $cats[] = $filtre;

				$query = Case_Studie::query_by_cat($cats, -1);
				foreach ($query->crocus as $case_studie) :
					$case_studie->show_view_thumb(['type' => 'small']);
				endforeach;
				?>
			</div>
		</div>
		
		<div class="sm:col-span-24">
			<?php 
			/** ON affiche les contenue lié */
			View::show('organismes/o-page-related', ['page' => $page]);
			?>
		</div>

	</div>

<?php endwhile;

get_footer();