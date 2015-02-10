<?php
namespace Application\Factories;
 
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LondonTennis\Api\Client\Client;
use Application\Service\ApiAwareService;
 
class ApiServiceFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        $className = 'Application\Service\\' . $requestedName;
        
        if (class_exists($className)) {
            return true;
        }
 
        return false;
    }
 
    public function createServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        $className = 'Application\Service\\' . $requestedName;
        $service = new $className;
        
        if ($service instanceof ApiAwareService) {
            $apiClient = new Client();
            $service->setApiClient($apiClient);
        }
        
        return $service;
    }

}