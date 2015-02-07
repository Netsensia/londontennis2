<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class SubMenuOption extends AbstractHelper
{
    public function __invoke($route, $label, $activeClass, $inactiveClass='')
    {
        $routeName = $this->view->routeName();
        
        if ($routeName == $route) {
            $class = $activeClass;
        } else {
            $class = $inactiveClass;
        }
        
        echo '<li class="' . $class . '"><a href="' . $this->view->url($route) . '">' . $label . '</a></li>';
    }
}
