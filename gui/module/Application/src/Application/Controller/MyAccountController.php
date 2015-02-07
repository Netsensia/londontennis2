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

class MyAccountController extends AbstractActionController
{
    public function dashboardAction()
    {
        return new ViewModel();
    }
    
    public function inboxAction()
    {
        return new ViewModel();
    }
    
    public function viewMessageAction()
    {
        return new ViewModel();
    }
    
    public function sendMessageAction()
    {
        return new ViewModel();
    }
    
    public function sentMessagesAction()
    {
        return new ViewModel();
    }

    public function settingsAction()
    {
        return new ViewModel();
    }
    
    public function friendsAction()
    {
        return new ViewModel();
    }
    
    public function blockListAction()
    {
        return new ViewModel();
    }
    
    public function calendarAction()
    {
        return new ViewModel();
    }
    
    public function entriesAction()
    {
        return new ViewModel();
    }
}
