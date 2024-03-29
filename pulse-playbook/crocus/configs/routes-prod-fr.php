<?php
/**************************************************************
 *
 * Routing prod
 * Accessible ensuite via la class Router
 * exemple : $url = Router::get_url('home')
 *
 **************************************************************/

return [
    'home' => home_url(),
    'personas' => home_url('/personas'),
    'journey' => home_url('/customer-journey'),
    'methodology' => home_url('/methodology'),
    'methodology.personas' => home_url('/methodology/personas'),
    'methodology.custumerjourney' => home_url(
        '/methodology/customer-journey-2'
    ),
    'templates' => home_url('/blank-templates'),
    'case-studies' => home_url('/case-studies'),
    'cx-survey' => home_url('/cx-survey'),
    'cx-survey-choice' => home_url('/cx-survey-choice'),
];
