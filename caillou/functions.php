<?php

add_action('wp_enqueue_scripts', 'wami_theme_enqueue_script');
function wami_theme_enqueue_script()
{
    $in_footer = true;
    $theme_dir = get_template_directory_uri();

    /*** Styles ***/
    wp_enqueue_style('theme', get_stylesheet_uri());
    wp_enqueue_style('main', $theme_dir . '/assets/css/main.css');

    /*** Scripts ***/
    wp_deregister_script('jquery');
    wp_enqueue_script(
        'jquery',
        $theme_dir . '/assets/js/jquery.min.js',
        false,
        '',
        $in_footer
    );
    wp_localize_script('wami_main', 'wami_js', [
        'themeurl' => $theme_dir,
        'ajaxurl' => admin_url('admin-ajax.php'),
        'siteurl' => site_url(),
    ]);
}

/*
* On utilise une fonction pour créer notre custom post type 'projets'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'projets', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Projet', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Projets'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les projets'),
		'view_item'           => __( 'Voir les projets'),
		'add_new_item'        => __( 'Ajouter une nouvelle Projet'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la projets'),
		'update_item'         => __( 'Modifier la projets'),
		'search_items'        => __( 'Rechercher une Projet'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Projets'),
		'description'         => __( 'Tous mes projets'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-video-alt2',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/	
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'projets'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'projets', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

function disable_upload_sizes( $sizes, $metadata ) {

    // Get filetype data.
    $filetype = wp_check_filetype($metadata['file']);

    // Check if is gif. 
    if($filetype['type'] == 'image/gif') {
        // Unset sizes if file is gif.
        $sizes = array();
    }

    // Return sizes you want to create from image (None if image is gif.)
    return $sizes;
}   
add_filter('intermediate_image_sizes_advanced', 'disable_upload_sizes', 10, 2); 
