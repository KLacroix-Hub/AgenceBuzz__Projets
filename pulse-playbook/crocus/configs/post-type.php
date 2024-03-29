<?php
/**************************************************************
 *
 * Ajouter ici tous les customs post type du theme
 *
 *
 **************************************************************/

return [

    'persona' => [
        'labels' => [
            'name' => __('Personas'),
            'singular_name' => __('Persona'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'persona'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businesswoman',
    ],

    'custumer-journey' => [
        'labels' => [
            'name' => __('Custumer Journeys'),
            'singular_name' => __('Custumer Journey'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'custumer-journey'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-rest-api',
    ],

    'case-studie' => [
        'labels' => [
            'name' => __('Impacts'),
            'singular_name' => __('Impact'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'impact'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-chart-area',
    ],

    'nouvelle' => [
        'labels' => [
            'name' => __('Nouvelles'),
            'singular_name' => __('Nouvelle'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'nouvelle'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-site-alt3',
    ],

    'agenda' => [
        'labels' => [
            'name' => __('Agendas'),
            'singular_name' => __('Agenda'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'agenda'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-pressthis',
    ],

    'collaborateur' => [
        'labels' => [
            'name' => __('Collaborateurs'),
            'singular_name' => __('Collaborateur'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'collaborateur'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
    ],

    'templates' => [
        'labels' => [
            'name' => __('Templatess'),
            'singular_name' => __('Templates'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'templates'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-media-document',
    ],

    'relationship-map' => [
        'labels' => [
            'name' => __('Relationship Maps'),
            'singular_name' => __('Relationship Map'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'relationship-map'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-block-default',
    ],

    'toolkit' => [
        'labels' => [
            'name' => __('Toolkits'),
            'singular_name' => __('Toolkit'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'toolkit'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt',
    ],

    'service' => [
        'labels' => [
            'name' => __('Services'),
            'singular_name' => __('Service'),
        ],
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'service'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-site-alt3',
    ],


];
