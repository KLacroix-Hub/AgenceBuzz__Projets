<?php

// function custom_page_template( $template ) {
//     $current_page_id = get_queried_object_id();
//     $parent_page_id = wp_get_post_parent_id( $current_page_id );
//     $tpls = ['templates/tpl-tabs.php', 'templates/tpl-menu.php'];

//     // Vérifie si la page actuelle est une page enfant
//     if ( $parent_page_id ) {
//         $parent_template = get_page_template_slug( $parent_page_id );

//         // Définir le modèle parent si disponible
//         if ( $parent_template && in_array($parent_template, $tpls)) {
//             $template = locate_template( array( $parent_template ) );
//         }
//     }

//     return $template;
// }

// add_filter( 'page_template', 'custom_page_template' );

// Masquer le champ "Modèle" dans la méta-box "Attributs de page"
function custom_hide_page_template() {
    $current_page_id = get_queried_object_id();
    $parent_page_id = wp_get_post_parent_id( $current_page_id );

    // Vérifier si la page actuelle est une page enfant
    if ( $parent_page_id ) {
        
        $parent_template = get_page_template( $parent_page_id );
        $parent_template_slug = get_page_template_slug( $parent_page_id );
        $tpls = ['templates/tpl-tabs.php', 'templates/tpl-menu.php'];
        
        if ( $parent_template && in_array($parent_template_slug, $tpls)) {
            // Obtenir les métadonnées du fichier de template
            $template_data = get_file_data( $parent_template, array( 'Name' => 'Template Name' ) );
            
            // Récupérer le nom du modèle (template)
            $template_name = $template_data['Name'];
            
            // Afficher le nom du modèle
            echo '<style>#pageparentdiv .page-template-label-wrapper { display: none; }</style>';
            echo '<style>#pageparentdiv .page-template-label-wrapper + select { display: none; }</style>';
            echo '<style>#pageparentdiv .inside::before { content: "→ '.$template_name.'"; }</style>';
            
        }
    }
}

add_action( 'admin_head', 'custom_hide_page_template' );

// Enregistrer le modèle parent lorsque la page est mise à jour
function custom_save_parent_template( $post_id ) {
    $parent_page_id = wp_get_post_parent_id( $post_id );

    // Vérifier si la page actuelle est une page enfant et si un modèle parent est défini
    if ( $parent_page_id ) {
        $post = get_post($post_id);

        $parent_color_theme = get_field('page_theme', $parent_page_id);
        update_post_meta($post_id, 'page_theme', $parent_color_theme);

        $parent_template = get_page_template_slug( $parent_page_id );
        $tpls = ['templates/tpl-tabs.php', 'templates/tpl-menu.php'];

        // Si un modèle parent est défini, enregistrer le modèle de la page parente
        if ( $parent_template && in_array($parent_template, $tpls)) {
            update_post_meta( $post_id, '_wp_page_template', $parent_template );
        }
    }
}

add_action( 'save_post', 'custom_save_parent_template' );