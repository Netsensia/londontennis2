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

class CourtsController extends AbstractActionController
{
    public function searchAction()
    {
        return new ViewModel();
    }
    
    public function popularAction()
    {
        return new ViewModel();
    }
    
    public function profileAction()
    {
        return new ViewModel();
    }
    
    public function favouritesAction()
    {
        return new ViewModel();
    }
}
