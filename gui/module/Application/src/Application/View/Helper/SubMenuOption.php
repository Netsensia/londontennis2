<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class SubMenuOption extends AbstractHelper
{
    public function __invoke($route, $label, $activeClass, $params = [], $forceActive = false)
    {
        $routeName = $this->view->routeName();
        $routeParams = $this->view->routeParams();
        
        unset($routeParams['controller']);
        unset($routeParams['action']);
                
        if ($forceActive || ($routeName == $route && $routeParams == $params)) {
            $class = $activeClass;
        } else {
            $class = '';
        }
        
        echo '<li class="' . $class . '"><a href="' . $this->view->url($route, $params) . '">' . $label . '</a></li>';
    }
}
