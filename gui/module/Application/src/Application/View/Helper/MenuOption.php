<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class MenuOption extends AbstractHelper
{
    public function __invoke($route, $label, $activeClass, $inactiveClass='')
    {
        $routeName = $this->view->routeName();
        
        $parts = explode('/', $routeName);
        
        if ($parts[0] == $route) {
            $class = $activeClass;
        } else {
            $class = $inactiveClass;
        }
        
        echo '<li class="' . $class . '"><a href="' . $this->view->url($route) . '">' . $label . '</a></li>';
    }
}
