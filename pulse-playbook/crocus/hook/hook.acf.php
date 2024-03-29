<?php
/**************************************************************
 *
 * Fichier regroupant les hooks ACF
 *
 **************************************************************/

add_action('acf/init', 'on_register_acf_options_pages');
function on_register_acf_options_pages()
{
    // Check function exists.
    if (!function_exists('acf_add_options_page')) {
        return;
    }

    $parent = acf_add_options_page([
        'page_title' => 'Paramètres',
        'menu_title' => 'Paramètres',
        'menu_slug' => 'site-param',
        'capability' => 'edit_posts',
        'redirect' => false,
        'position' => 4,
    ]);


    $child = acf_add_options_sub_page(array(
        'page_title'  => 'Menus',
        'menu_title'  => 'Menus',
        'capability' => 'edit_posts',
        'parent_slug' => $parent['menu_slug'],
    ));

}

/**
 * Intervenir sur un field à la volé
 */
// add_filter('acf/load_field/type=text', 'acf_load_color_field_identifiant');
// function acf_load_color_field_identifiant($field)
// {
//     // return the field
//     // if($field["value"] === NULL)
//     debug($field);
//     if($field['name'] == 'identifiant'){
//         $field['value'] = uniqid();
//     }
//     return $field;
// }

/**
 * Filtre les champs "Objet Article" par type de contenue demandé
 */
//add_filter('acf/fields/post_object/query', 'on_acf_fields_post_object_query', 10, 3);
//function on_acf_fields_post_object_query( $args, $field, $post_id ) {}
