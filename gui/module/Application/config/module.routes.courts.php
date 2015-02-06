<?php

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
            'courts' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/courts',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Courts',
                        'action'     => 'search',
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
                    'popular' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/popular',
                            'defaults' => [
                                'action' => 'popular',
                            ],
                        ],
                    ],
                    'profile' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/profile[/:id]',
                            'defaults' => [
                                'action' => 'profile',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'favourites' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/favourites',
                            'defaults' => [
                                'action' => 'favourites',
                                'id' => 0,
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),
);
