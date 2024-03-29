<?php
/**************************************************************
 *
 * Config commune à tous les environements
 *
 **************************************************************/

return [
    'mail_from' => 'tech@wami-concept.com',
    'textdomain' => 'hds',

    // 'post_label' => [
    //   'name' => '{Nom}',
    //   'add' => 'Ajouter un {Nom}',
    //   'edit' => 'Modifier un {Nom}',
    //   'search' => 'Chercher des {Nom}',
    //   'show' => 'Afficher un {Nom}'
    // ],

    // 'category_label' => [
    //   'name' => '{Nom}',
    //   'singular_name' => '{Nom}',
    //   'add_new' => 'Ajouter un {Nom}',
    //   'add_new_item' => 'Ajouter un {Nom}',
    //   'new_item' => '{Nom}',
    //   'view_item' => 'Voir le {Nom}',
    //   'search_items' => 'Chercher un {Nom}',
    //   'not_found' => '{Nom} non trouvé',
    //   'all_items' =>' Tous les {Nom}',
    //   'menu_name' => '{Nom}',
    //   'name_admin_bar' => '{Nom}'
    // ],

    'menus' => [
        ['location' => 'header-menu', 'description' => 'Menu principal'],
        ['location' => 'footer-menu', 'description' => 'Menu footer'],
    ],
];
