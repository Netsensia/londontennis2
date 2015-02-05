<?php
namespace LondonTennis;

use ZF\Apigility\Provider\ApigilityProviderInterface;
use Zend\Db\Adapter\Adapter;

class Module implements ApigilityProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'DatabaseConnection' => function($sm) {
                    $adapter = $sm->get('DatabaseAdapter');
                    $connection = $adapter->getDriver()->getConnection();
                    return $connection;
                },
                'DatabaseAdapter' => function($sm) {
                    $config = $sm->get('config');
                    $adapterConfig = $config['db']['adapters']['londontennis'];
                    $adapter = new Adapter($adapterConfig);
                    return $adapter;
                },
                'ZendCache' => function () {
                    return \Zend\Cache\StorageFactory::factory(
                        array(
                            'adapter' => array(
                                'name' => 'filesystem',
                                'options' => array(
                                    'dirLevel' => 2,
                                    'cacheDir' => '/tmp',
                                    'ttl' => 14400,
                                    'dirPermission' => 0755,
                                    'filePermission' => 0666,
                                    'namespace' => 'twibalist',
                                    'namespaceSeparator' => '-db-'
                                ),
                            ),
                            'plugins' => array('serializer'),
                        )
                    );
                },
            ],
       ];
    }
}
