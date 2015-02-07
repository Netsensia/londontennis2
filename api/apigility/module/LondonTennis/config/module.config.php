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
            'london-tennis.rest.forum' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/forum[/:forum_id]',
                    'defaults' => array(
                        'controller' => 'LondonTennis\\V1\\Rest\\Forum\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'london-tennis.rest.token',
            1 => 'london-tennis.rest.forum',
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
        'LondonTennis\\V1\\Rest\\Forum\\Controller' => array(
            'listener' => 'LondonTennis\\V1\\Rest\\Forum\\ForumResource',
            'route_name' => 'london-tennis.rest.forum',
            'route_identifier_name' => 'forum_id',
            'collection_name' => 'forum',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'LondonTennis\\V1\\Rest\\Forum\\ForumEntity',
            'collection_class' => 'LondonTennis\\V1\\Rest\\Forum\\ForumCollection',
            'service_name' => 'forum',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'LondonTennis\\V1\\Rest\\Token\\Controller' => 'HalJson',
            'LondonTennis\\V1\\Rest\\Forum\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'LondonTennis\\V1\\Rest\\Token\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'LondonTennis\\V1\\Rest\\Forum\\Controller' => array(
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
            'LondonTennis\\V1\\Rest\\Forum\\Controller' => array(
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
            'LondonTennis\\V1\\Rest\\Forum\\ForumEntity' => array(
                'entity_identifier_name' => 'forumid',
                'route_name' => 'london-tennis.rest.forum',
                'route_identifier_name' => 'forum_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'LondonTennis\\V1\\Rest\\Forum\\ForumCollection' => array(
                'entity_identifier_name' => 'forumid',
                'route_name' => 'london-tennis.rest.forum',
                'route_identifier_name' => 'forum_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'LondonTennis\\V1\\Rest\\Forum\\ForumResource' => array(
                'adapter_name' => 'londontennis',
                'table_name' => 'forum',
                'hydrator_name' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'LondonTennis\\V1\\Rest\\Forum\\Controller',
                'entity_identifier_name' => 'forumid',
                'table_service' => 'LondonTennis\\V1\\Rest\\Forum\\ForumResource\\Table',
            ),
        ),
    ),
);
