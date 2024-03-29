<?php

add_filter('rest_url_prefix', 'crocus_rest_url_prefix');
function crocus_rest_url_prefix($slug)
{
    return 'api';
}

add_action('rest_api_init', 'crocus_register_rest_routes');
function crocus_register_rest_routes()
{
    register_rest_route('v1', '/agenda/type/(?P<slug_cat>[a-zA-Z0-9-]+)', [
        'methods' => 'GET',
        'callback' => ['Agenda', 'API_get_by_type'],
    ]);

    register_rest_route('v1', '/page/(?P<id>[a-zA-Z0-9-]+)', [
        'methods' => 'GET',
        'callback' => ['Page', 'API_get_child_tab'],
    ]);

    register_rest_route('v1', '/pages', [
        'methods' => 'POST',
        'callback' => ['Page', 'API_get_pages_by_ID'],
    ]);

    register_rest_route('v1', '/pages/question', [
        'methods' => 'POST',
        'callback' => ['Page', 'API_get_question'],
    ]);

    register_rest_route('v1', '/personas', [
        'methods' => 'POST',
        'callback' => ['Persona', 'API_get_personas'],
    ]);

    register_rest_route('v1', '/custumer-journey', [
        'methods' => 'POST',
        'callback' => ['Custumer_Journey', 'API_get_journey'],
    ]);

    register_rest_route('v1', '/case-studies', [
        'methods' => 'POST',
        'callback' => ['Case_Studie', 'API_get_case_studies'],
    ]);

    register_rest_route('v1', '/toolkit', [
        'methods' => 'POST',
        'callback' => ['Toolkit', 'API_get_toolkits'],
    ]);

}

add_filter( 'rest_authentication_errors', 'validate_request_referer' );
function validate_request_referer() {

    $allowed_referer = home_url();
    $parsed_url = parse_url($allowed_referer);
    $allowed_referer = $parsed_url['scheme'] . '://' . $parsed_url['host'] . '/';
    
    $referer = wp_get_referer();
    $parsed_url = parse_url($referer);
    if(!$referer){
        return new WP_Error( 'invalid_referer', 'Invalid referer.', array( 'status' => 403 ) );
    }
    
    $referer = $parsed_url['scheme'] . '://' . $parsed_url['host'] . '/';

    if ( $referer !== $allowed_referer ) {
        return new WP_Error( 'invalid_referer', 'Invalid referer.', array( 'status' => 403 ) );
    }

    return true;

}

