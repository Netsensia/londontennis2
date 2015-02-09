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
            'london-tennis.rest.forumthread' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/forumthread[/:forumthread_id]',
                    'defaults' => array(
                        'controller' => 'LondonTennis\\V1\\Rest\\Forumthread\\Controller',
                    ),
                ),
            ),
            'london-tennis.rest.thread' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/thread[/:thread_id]',
                    'defaults' => array(
                        'controller' => 'LondonTennis\\V1\\Rest\\Thread\\Controller',
                    ),
                ),
            ),
            'london-tennis.rest.post' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/post[/:post_id]',
                    'defaults' => array(
                        'controller' => 'LondonTennis\\V1\\Rest\\Post\\Controller',
                    ),
                ),
            ),
            'london-tennis.rest.player' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/player[/:player_id]',
                    'defaults' => array(
                        'controller' => 'LondonTennis\\V1\\Rest\\Player\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'london-tennis.rest.token',
            1 => 'london-tennis.rest.forum',
            3 => 'london-tennis.rest.forumthread',
            4 => 'london-tennis.rest.forumthread',
            5 => 'london-tennis.rest.thread',
            6 => 'london-tennis.rest.post',
            7 => 'london-tennis.rest.player',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'LondonTennis\\V1\\Rest\\Token\\TokenResource' => 'LondonTennis\\V1\\Rest\\Token\\TokenResourceFactory',
            'LondonTennis\\V1\\Rest\\Forumthread\\ForumthreadResource' => 'LondonTennis\\V1\\Rest\\Forumthread\\ForumthreadResourceFactory',
            'LondonTennis\\V1\\Rest\\Thread\\ThreadResource' => 'LondonTennis\\V1\\Rest\\Thread\\ThreadResourceFactory',
            'LondonTennis\\V1\\Rest\\Post\\PostResource' => 'LondonTennis\\V1\\Rest\\Post\\PostResourceFactory',
            'LondonTennis\\V1\\Rest\\Player\\PlayerResource' => 'LondonTennis\\V1\\Rest\\Player\\PlayerResourceFactory',
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
        'LondonTennis\\V1\\Rest\\Thread\\Controller' => array(
            'listener' => 'LondonTennis\\V1\\Rest\\Thread\\ThreadResource',
            'route_name' => 'london-tennis.rest.thread',
            'route_identifier_name' => 'thread_id',
            'collection_name' => 'thread',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'forum_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'LondonTennis\\V1\\Rest\\Thread\\ThreadEntity',
            'collection_class' => 'LondonTennis\\V1\\Rest\\Thread\\ThreadCollection',
            'service_name' => 'thread',
        ),
        'LondonTennis\\V1\\Rest\\Post\\Controller' => array(
            'listener' => 'LondonTennis\\V1\\Rest\\Post\\PostResource',
            'route_name' => 'london-tennis.rest.post',
            'route_identifier_name' => 'post_id',
            'collection_name' => 'post',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(
                0 => 'thread_id',
            ),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'LondonTennis\\V1\\Rest\\Post\\PostEntity',
            'collection_class' => 'LondonTennis\\V1\\Rest\\Post\\PostCollection',
            'service_name' => 'post',
        ),
        'LondonTennis\\V1\\Rest\\Player\\Controller' => array(
            'listener' => 'LondonTennis\\V1\\Rest\\Player\\PlayerResource',
            'route_name' => 'london-tennis.rest.player',
            'route_identifier_name' => 'player_id',
            'collection_name' => 'player',
            'entity_http_methods' => array(
                0 => 'GET',
            ),
            'collection_http_methods' => array(),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'LondonTennis\\V1\\Rest\\Player\\PlayerEntity',
            'collection_class' => 'LondonTennis\\V1\\Rest\\Player\\PlayerCollection',
            'service_name' => 'player',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'LondonTennis\\V1\\Rest\\Token\\Controller' => 'HalJson',
            'LondonTennis\\V1\\Rest\\Forum\\Controller' => 'HalJson',
            'LondonTennis\\V1\\Rest\\Thread\\Controller' => 'HalJson',
            'LondonTennis\\V1\\Rest\\Post\\Controller' => 'HalJson',
            'LondonTennis\\V1\\Rest\\Player\\Controller' => 'HalJson',
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
            'LondonTennis\\V1\\Rest\\Thread\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'LondonTennis\\V1\\Rest\\Post\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'LondonTennis\\V1\\Rest\\Player\\Controller' => array(
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
            'LondonTennis\\V1\\Rest\\Thread\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/json',
            ),
            'LondonTennis\\V1\\Rest\\Post\\Controller' => array(
                0 => 'application/vnd.london-tennis.v1+json',
                1 => 'application/json',
            ),
            'LondonTennis\\V1\\Rest\\Player\\Controller' => array(
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
            'LondonTennis\\V1\\Rest\\Thread\\ThreadEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.thread',
                'route_identifier_name' => 'thread_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'LondonTennis\\V1\\Rest\\Thread\\ThreadCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.thread',
                'route_identifier_name' => 'thread_id',
                'is_collection' => true,
            ),
            'LondonTennis\\V1\\Rest\\Post\\PostEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.post',
                'route_identifier_name' => 'post_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'LondonTennis\\V1\\Rest\\Post\\PostCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.post',
                'route_identifier_name' => 'post_id',
                'is_collection' => true,
            ),
            'LondonTennis\\V1\\Rest\\Player\\PlayerEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.player',
                'route_identifier_name' => 'player_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'LondonTennis\\V1\\Rest\\Player\\PlayerCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'london-tennis.rest.player',
                'route_identifier_name' => 'player_id',
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
    'zf-content-validation' => array(
        'LondonTennis\\V1\\Rest\\Thread\\Controller' => array(
            'input_filter' => 'LondonTennis\\V1\\Rest\\Thread\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'LondonTennis\\V1\\Rest\\Thread\\Validator' => array(),
    ),
);
