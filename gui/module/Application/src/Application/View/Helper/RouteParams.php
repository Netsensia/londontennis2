<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Mvc\Router\RouteMatch;

class RouteParams extends AbstractHelper
{
    public function __invoke()
    {
        $params = [];
        
        $routeMatch = $this->view->getHelperPluginManager()
            ->getServiceLocator()
            ->get('Application')
            ->getMvcEvent()
            ->getRouteMatch();
        
        if ($routeMatch) {
            $params = $routeMatch->getParams();
        }
        
        return $params;
    }
}
