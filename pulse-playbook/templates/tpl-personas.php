<?php /*
Template Name: Page - Personas
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
    
    <div class="grid sm:grid-cols-24 c-theme c-theme--blue-dark">

        <div class="sm:col-span-2"></div>

        <div class="sm:col-span-6">
            <?php
                /** Filtres */
                View::show('organismes/o-filtres', [
                    'type' => 'personas',
                    "class_css"=>"",
                    'taxos' => [
                        [
                            'titre' => 'Customer target',
                            'class' => 'Custumer_Groupe'
                        ],
                        [
                            'titre' => 'Type of persona',
                            'class' => 'Type_Persona'
                        ],
                        [
                            'titre' => 'Business origin',
                            'class' => 'Brand_Choice'
                        ],
                        [
                            'titre' => 'Region origin',
                            'class' => 'Location'
                        ],
                        [
                            'titre' => 'Market approach',
                            'class' => 'Market_Approach'
                        ]
                    ]
                ]);
            ?>
        </div>

        <div class="sm:col-span-1"></div>

        <div class="sm:col-span-13">
            <?php 
            /** Liste des personnas */
            $query = Persona::query(['posts_per_page' => -1]);
            View::show('organismes/o-liste-personas-journey', [
                'query' => $query,
                'page' => $page,
                'cols' => '2',
            ]);
            ?>
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
