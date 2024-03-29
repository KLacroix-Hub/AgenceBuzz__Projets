<?php
/**************************************************************
 *
 * Fichier regroupant les hooks liez à l'interface Admin
 *
 **************************************************************/

/**
 * Custom du style du formulaire des themes
 */

add_action('category_add_form', 'hide_description_row');
function hide_description_row()
{
    ?>
  <style> 
    .term-description-wrap { display:none; }
    .term-parent-wrap { display:none; } 
    .term-slug-wrap { display:none; } 
  </style>
<?php
}

/**
 * Disable admin bar on the frontend of your website
 * for subscribers.
 */
add_action('after_setup_theme', 'themeblvd_disable_admin_bar');
function themeblvd_disable_admin_bar()
{
    if (!current_user_can('edit_posts')) {
        add_filter('show_admin_bar', '__return_false');
    }
}

/**
 * Redirect back to homepage and not allow access to
 * WP admin for Subscribers.
 */
add_action('admin_init', 'themeblvd_redirect_admin');
function themeblvd_redirect_admin()
{
    if (!defined('DOING_AJAX') && !current_user_can('edit_posts')) {
        wp_redirect(site_url());
        exit();
    }
}

/**
 *  Remove the h1 tag from the WordPress editor.
 *
 *  @param   array  $settings  The array of editor settings
 *  @return  array             The modified edit settings
 */

function remove_h1_from_editor($settings)
{
    $settings['block_formats'] =
        'Paragraph=p;Titre 2=h2;Titre 3=h3;Titre 4=h4;Titre 5=h5;Titre 6=h6;Préformaté=pre;';
    return $settings;
}
add_filter('tiny_mce_before_init', 'remove_h1_from_editor');

