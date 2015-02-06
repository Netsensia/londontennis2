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
            'results' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/results',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Results',
                        'action' => 'all',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => [
                    'all' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/',
                            'defaults' => [
                                'action' => 'all',
                            ],
                        ],
                    ],
                    'friendly' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/friendly',
                            'defaults' => [
                                'action' => 'friendly',
                            ],
                        ],
                    ],
                    'knockout' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/knockout',
                            'defaults' => [
                                'action' => 'knockout',
                            ],
                        ],
                    ],
                    'league' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/league',
                            'defaults' => [
                                'action' => 'league',
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'action' => 'add-result',
                            ],
                        ],
                    ],
                    'my' => [
                        'type' => 'Zend\Mvc\Router\Http\Literal',
                        'options' => [
                            'route' => '/mine',
                            'defaults' => [
                                'action' => 'my-results',
                            ],
                        ],
                    ],
                ],
            ),
        ),
    ),

);
