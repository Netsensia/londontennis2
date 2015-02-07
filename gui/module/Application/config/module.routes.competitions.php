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
            'competitions' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/competitions',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Competitions',
                        'action'     => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => [
                    'current' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/current',
                            'defaults' => [
                                'action' => 'current',
                            ],
                        ],
                    ],
                    'previous' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/previous',
                            'defaults' => [
                                'action' => 'previous',
                            ],
                        ],
                    ],
                    'ko' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/ko',
                            'defaults' => [
                                'action' => 'ko',
                                'id' => 0,
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),
);
