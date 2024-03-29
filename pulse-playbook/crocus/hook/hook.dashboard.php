<?php

/**
 * On cache toute les widgets
 */
add_action('wp_dashboard_setup', 'remove_default_dashboard_widgets');
function remove_default_dashboard_widgets()
{
    // Main column:
    remove_meta_box('dashboard_browser_nag', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');

    // Side Column:
    remove_meta_box('dashboard_activity', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'side');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

/**
 * On ajoute des métabox au dashboard
 */
// add_action('wp_dashboard_setup', 'crocus_dashboard_add_widgets');
// function crocus_dashboard_add_widgets()
// {
//     wp_add_dashboard_widget(
//         '{widget_id}',
//         __('Le prix du public', 'hds'),
//         'crocus_lewidget'
//     );
// }

// function crocus_lewidget()
// {
//     // Ici le template du widget
// }
