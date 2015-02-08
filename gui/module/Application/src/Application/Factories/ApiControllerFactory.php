<?php
namespace Application\Factories;
 
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\ApiAwareController;
use LondonTennis\Api\Client\Client;
 
class ApiControllerFactory implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        if (class_exists($this->getControllerName($requestedName))) {
            return true;
        }
 
        return false;
    }
 
    public function createServiceWithName(ServiceLocatorInterface $locator, $name, $requestedName)
    {
        $className = $this->getControllerName($requestedName);
        
        $controller = new $className;
        
        if ($controller instanceof ApiAwareController) {
            $apiClient = new Client();
            $controller->setApiClient($apiClient);
        }
        
        return $controller;
    }
    
    private function getControllerName($requestedName)
    {
        return $requestedName . 'Controller';
    }
}