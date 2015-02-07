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
                            'defaults' => [
                                'action' => 'view-forum',
                            ],
                        ],
                    ],
                    'new-thread' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/new-thread[/:forumid]',
                            'defaults' => [
                                'action' => 'new-thread',
                            ],
                        ],
                    ],
                    'view-thread' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/view-thread[/:threadid]',
                            'defaults' => [
                                'action' => 'view-thread',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'reply' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/reply[/:postid]',
                            'defaults' => [
                                'action' => 'reply',
                                'id' => 0,
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),
);
