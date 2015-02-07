<?php
use Zend\Authentication\AuthenticationService;
use Application\Adapter\AuthAdapter;
use LondonTennis\Api\Client\Client;
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'players' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/players',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Players',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => [
                    'search' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/search',
                            'defaults' => [
                                'action' => 'search',
                            ],
                        ],
                    ],
                    'most-played' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/leaderboards/most-played',
                            'defaults' => [
                                'action' => 'most-played',
                            ],
                        ],
                    ],
                    'most-wins' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/leaderboards/most-wins',
                            'defaults' => [
                                'action' => 'most-wins',
                            ],
                        ],
                    ],
                    'top-ranked' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/leaderboards/top-ranked',
                            'defaults' => [
                                'action' => 'top-ranked',
                            ],
                        ],
                    ],
                    'recently-played' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/recently-played',
                            'defaults' => [
                                'action' => 'recently-played',
                            ],
                        ],
                    ],
                    'currently-online' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/currently-online',
                            'defaults' => [
                                'action' => 'currently-online',
                            ],
                        ],
                    ],
                    'recent-joiners' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/recent-joiners',
                            'defaults' => [
                                'action' => 'recent-joiners',
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),
);
