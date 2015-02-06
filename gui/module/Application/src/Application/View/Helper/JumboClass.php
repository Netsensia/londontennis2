<?php
namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class JumboClass extends AbstractHelper
{
    public function __invoke()
    {
        $routeName = $this->view->routeName();
        
        $parts = explode('/', $routeName);
        
        switch ($parts[0]) {
            case 'forums': return 'forum';
            case 'myaccount': return 'account';
            default: return $parts[0];
        }
    }
}
