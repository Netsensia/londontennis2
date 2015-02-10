<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;

class PlayersController extends ApiAwareController
{
    public function indexAction()
    {
        $this->redirect()->toRoute('players/search');    
    }
    
    public function profileAction()
    {
        $playerDetails = $this->getServiceLocator()->get('PlayerService')->getPlayerDetails(
            $this->params()->fromRoute('playerid')
        );
                
        return [
            'player' => $playerDetails,  
        ];
    }
    
    public function popupProfileAction()
    {
        $this->layout('layout/empty');
        
        $service = $this->getServiceLocator()->get('PlayerService');
        
        $playerDetails = $service->getPlayerDetails(
            $this->params()->fromRoute('playerid')
        );
                
        return [
            'player' => $playerDetails,
        ];
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
