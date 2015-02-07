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

class PlayersController extends AbstractActionController
{
    public function indexAction()
    {
        $this->redirect()->toRoute('players/search');    
    }
    
    public function searchAction()
    {
        return new ViewModel();
    }
    
    public function mostWinsAction()
    {
        return new ViewModel();
    }
    
    public function mostPlayedAction()
    {
        return new ViewModel();
    }
    
    public function recentlyPlayedAction()
    {
        return new ViewModel();
    }
    
    public function currentlyOnlineAction()
    {
        return new ViewModel();
    }
    
    public function topRankedAction()
    {
        return new ViewModel();
    }
    
    public function recentJoinersAction()
    {
        return new ViewModel();
    }
}
