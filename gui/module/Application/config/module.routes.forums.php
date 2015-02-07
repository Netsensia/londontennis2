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
            'forums' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/forums',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Forums',
                        'action'     => 'list',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => [
                    'view-forum' => [
                        'type' => 'Zend\Mvc\Router\Http\Segment',
                        'options' => [
                            'route' => '[/:forumid]',
                            'constraints' => ['forumid' => '[0-9]*'],
                            'defaults' => [
                                'action' => 'view-forum',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'new-thread' => [
                                'type' => 'Zend\Mvc\Router\Http\Literal',
                                'options' => [
                                    'route' => '/new-thread',
                                    'defaults' => [
                                        'action' => 'new-thread',
                                    ],
                                ],
                            ],
                            'view-thread' => [
                                'type' => 'Zend\Mvc\Router\Http\Segment',
                                'options' => [
                                    'route' => '/view-thread[/:threadid]',
                                    'constraints' => ['threadid' => '[0-9]*'],
                                    'defaults' => [
                                        'action' => 'view-thread',
                                        'id' => 0,
                                    ],
                                ],
                                'may_terminate' => true,
                                'child_routes' => [
                                    'reply' => [
                                        'type' => 'Zend\Mvc\Router\Http\Literal',
                                        'options' => [
                                            'route' => '/reply',
                                            'defaults' => [
                                                'action' => 'reply',
                                                'id' => 0,
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),
);
