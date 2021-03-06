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
    
    'view_helpers' => [
        'invokables' => [
            'routeName'  => 'Application\View\Helper\RouteName',
            'routeParams'  => 'Application\View\Helper\RouteParams',
            'jumboClass' => 'Application\View\Helper\JumboClass',
            'menuOption' => 'Application\View\Helper\MenuOption',
            'subMenuOption' => 'Application\View\Helper\SubMenuOption',
            'playerLink' => 'Application\View\Helper\PlayerLink',
            'clubLink' => 'Application\View\Helper\ClubLink',
        ],
    ],
    
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
            'Application\Factories\ApiServiceFactory'
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
        'abstract_factories' => [
            'Application\Factories\ApiControllerFactory',
        ],
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
