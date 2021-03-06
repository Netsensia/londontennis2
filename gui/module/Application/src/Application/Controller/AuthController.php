<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

class AuthController extends ApiAwareController
{
    public function loginAction()
    {
        $username = $this->params()->fromPost('login-name');
        $password = $this->params()->fromPost('login-password');
        
        $authService = $this->getServiceLocator()->get('AuthenticationService');
        $adapter = $authService->getAdapter();
        $adapter->setCredentials($username, $password);
        $authService->authenticate();
        
        if ($authService->hasIdentity()) {
            $this->redirect()->toRoute('home');
        }
    }
    
    public function logoutAction()
    {
        $authService = $this->getServiceLocator()->get('AuthenticationService');
        $authService->clearIdentity();
        
        $this->redirect()->toRoute('home');
    }
    
    public function passwordResetAction()
    {
        
    }
    
    public function joinAction()
    {
    
    }
}
