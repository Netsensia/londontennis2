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
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Auth',
                        'action'     => 'login',
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/logout',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Auth',
                        'action'     => 'logout',
                    ),
                ),
            ),
            'courts' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/courts',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Courts',
                        'action'     => 'index',
                    ),
                ),
            ),
            'competitions' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/competitions',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Competitions',
                        'action'     => 'index',
                    ),
                ),
            ),
            'forums' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/forums',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Forums',
                        'action'     => 'index',
                    ),
                ),
            ),
            'myaccount' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/myaccount',
                    'defaults' => array(
                        'controller' => 'Application\Controller\MyAccount',
                        'action'     => 'index',
                    ),
                ),
            ),
            'directories' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/directories',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Directories',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_helpers' => [
        'invokables' => [
            'routeName'  => 'Application\View\Helper\RouteName',
            'jumboClass' => 'Application\View\Helper\JumboClass',
        ],
    ],
    
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
            'AuthenticationService' => 'Zend\Authentication\AuthenticationService',
        ),
        'factories' => [
            'Zend\Authentication\AuthenticationService' => function($sm) {
                $adapter = new AuthAdapter();
                $authService = new AuthenticationService();
                $authService->setAdapter($adapter);
                return $authService;
            },
            'Api' => function($sm) {
                return new Client();
            },
        ],
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Auth' => 'Application\Controller\AuthController',
            'Application\Controller\Players' => 'Application\Controller\PlayersController',
            'Application\Controller\Results' => 'Application\Controller\ResultsController',
            'Application\Controller\Courts' => 'Application\Controller\CourtsController',
            'Application\Controller\Competitions' => 'Application\Controller\CompetitionsController',
            'Application\Controller\Forums' => 'Application\Controller\ForumsController',
            'Application\Controller\MyAccount' => 'Application\Controller\MyAccountController',
            'Application\Controller\Directories' => 'Application\Controller\DirectoriesController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
