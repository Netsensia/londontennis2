<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController
{
    public function loginAction()
    {
        $authService = $this->getServiceLocator()->get('AuthenticationService');
        $authService->authenticate();
        
        $this->redirect()->toRoute('home');
    }
    
    public function logoutAction()
    {
        $authService = $this->getServiceLocator()->get('AuthenticationService');
        $authService->clearIdentity();
        
        $this->redirect()->toRoute('home');
    }
}
