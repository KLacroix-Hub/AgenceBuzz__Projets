<?php
/**************************************************************
 *
 * Ajouter ici toutes les taxonomies du theme
 *
 **************************************************************/

// '{tax-slug}' => [
// 	[{'post_type-slug'}],
// 	[
// 	'labels' => [
// 		'name'         	=> '{tax-nom}',
// 		'singular_name' => '{tax-nom}',
//   ],
// 	'public' => true,
// 	'show_ui' => false,
// 	'show_in_nav_menus' => false,
// 	'show_tagcloud' => false,
// 	'show_admin_column' => false,
// 	'hierarchical' => true
//   ]
// ]

return [

    'type-evenement' => [
        ['agenda'],
        [
            'labels' => [
                'name' => 'Type évènement',
                'singular_name' => 'Type évènements',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    'categorie-casestudie' => [
        ['case-studie'],
        [
            'labels' => [
                'name' => 'Categorie Casestudie',
                'singular_name' => 'Categorie Casestudies',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    /** OK */
    'type-persona' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Type Persona',
                'singular_name' => 'Type Personas',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    /** OK */
    'custumer-groupe' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Custumer Groupe',
                'singular_name' => 'Custumer Groupes',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    /** OK */
    'specialty' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Specialty',
                'singular_name' => 'Specialtys',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    /** OK */
    'location' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Location',
                'singular_name' => 'Locations',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    /** OK */
    'brand-community' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Business Origin',
                'singular_name' => 'Business Origin',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],
    
    /** OK */
    'contact-with-sg' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Contact with SG',
                'singular_name' => 'Contact with SG',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    /** OK */
    'brand-choice' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Brand Choice',
                'singular_name' => 'Brand Choices',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],    

    /** OK */
    'market-approach' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Market Approach',
                'singular_name' => 'Market Approachs',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    'location-comunity' => [
        ['persona'],
        [
            'labels' => [
                'name' => 'Location Comunity',
                'singular_name' => 'Location Comunitys',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

    'categorie-toolkit' => [
        ['toolkit'],
        [
            'labels' => [
                'name' => 'Categorie Toolkit',
                'singular_name' => 'Categorie Toolkits',
            ],
            'public' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => false,
            'hierarchical' => true,
            'meta_box_cb' => false,
        ]
    ],

];
