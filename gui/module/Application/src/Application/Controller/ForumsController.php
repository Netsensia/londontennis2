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

class ForumsController extends AbstractActionController
{
    
    public function listAction()
    {
        return new ViewModel();
    }
    
    public function viewForumAction()
    {
        return new ViewModel();
    }
    
    public function newThreadAction()
    {
        return new ViewModel();
    }
    
    public function viewThreadAction()
    {
        return new ViewModel();
    }
    
    public function replyAction()
    {
        return new ViewModel();
    }
}
