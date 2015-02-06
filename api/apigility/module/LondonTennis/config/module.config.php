<?php
return array(
    'router' => array(
        'routes' => array(
            'london-tennis.rest.token' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/token[/:token_id]',
                    'defaults' => array(
                        'controller' => 'LondonTennis\\V1\\Rest\\Token\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'london-tennis.rest.token',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'LondonTennis\\V1\\Rest\\Token\\TokenResource' => 'LondonTennis\\V1\\Rest\\Token\\TokenResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'LondonTennis\\V1\\Rest\\Token\\Controller' => array(
            'listener' => 'LondonTennis\\V1\\Rest\\Token\\TokenResource',
            'route_name' => 'london-tennis.rest.token',
            'route_identifier_name' => 'token_id',
            'collection_name' => 'token',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'LondonTennis\\V1\\Rest\\Token\\TokenEntity',
            'collection_class' => 'LondonTennis\\V1\\Rest\\Token\\TokenCollection',
            'service_name' => 'token',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'LondonTennis\\V1\\Rest\\Token\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'LondonTennis\\V1\\Rest\\Token\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'LondonTennis\\V1\\Rest\\Token\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'LondonTennis\\V1\\Rest\\Token\\TokenEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.token',
                'route_identifier_name' => 'token_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'LondonTennis\\V1\\Rest\\Token\\TokenCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.token',
                'route_identifier_name' => 'token_id',
                'is_collection' => true,
            ),
        ),
    ),
);
