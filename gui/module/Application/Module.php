<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayUtils;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig(){
    
        $configFiles = [
            __DIR__ . '/config/module.config.php',
            __DIR__ . '/config/module.routes.home.php',
            __DIR__ . '/config/module.routes.players.php',
            __DIR__ . '/config/module.routes.results.php',
            __DIR__ . '/config/module.routes.competitions.php',
            __DIR__ . '/config/module.routes.forums.php',
            __DIR__ . '/config/module.routes.account.php',
            __DIR__ . '/config/module.routes.directories.php',
            __DIR__ . '/config/module.routes.courts.php',
        ];
    
        //---
    
        $config = array();
    
        // Merge all module config options
        foreach($configFiles as $configFile) {
            $config = ArrayUtils::merge( $config, include($configFile) );
        }
    
        return $config;
    
    }

    public function getControllerConfig()
    {
        return array(
            'abstract_factories' => array(
                'Application\Factories\ApiControllerFactory'
            ),
        );
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
