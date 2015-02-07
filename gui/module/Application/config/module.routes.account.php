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
            'myaccount' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/myaccount',
                    'defaults' => array(
                        'controller' => 'Application\Controller\MyAccount',
                        'action'     => 'dashboard',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => [
                    'dashboard' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/dashboard',
                            'defaults' => [
                                'action' => 'dashboard',
                            ],
                        ],
                    ],
                    'inbox' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/inbox',
                            'defaults' => [
                                'action' => 'inbox',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'view-message' => [
                                'type' => 'Zend\Mvc\Router\Http\Literal',
                                'options' => [
                                    'route' => '[/:id]',
                                    'defaults' => [
                                        'action' => 'view-message',
                                        'id' => 0,
                                    ],
                                ],
                            ],
                            'send-message' => [
                                'type' => 'Zend\Mvc\Router\Http\Literal',
                                'options' => [
                                    'route' => '/send-message',
                                    'defaults' => [
                                        'action' => 'send-message',
                                    ],
                                ],
                            ],
                            'sent-messages' => [
                                'type' => 'Zend\Mvc\Router\Http\Literal',
                                'options' => [
                                    'route' => '/sent-messages',
                                    'defaults' => [
                                        'action' => 'sent-messages',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'settings' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/settings',
                            'defaults' => [
                                'action' => 'settings',
                            ],
                        ],
                    ],
                    'friends' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/friends',
                            'defaults' => [
                                'action' => 'friends',
                            ],
                        ],
                    ],
                    'block-list' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/block-list',
                            'defaults' => [
                                'action' => 'block-list',
                            ],
                        ],
                    ],
                    'calendar' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/calendar',
                            'defaults' => [
                                'action' => 'calendar',
                            ],
                        ],
                    ],
                    'entries' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/entries',
                            'defaults' => [
                                'action' => 'entries',
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),
);
