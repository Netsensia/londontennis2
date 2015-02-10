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
        $playerId = $this->params()->fromRoute('playerid');
        $playerDetails = $this->api()->getPlayerDetails($playerId);
        
        if (trim($playerDetails['userRating']) != '') {
            $playerDetails['userRating'] = 'ITN ' . $playerDetails['userRating'];
        }
        
        if (trim($playerDetails['joinDate']) != '') {
            $playerDetails['joinDate'] = date('F j, Y', strtotime($playerDetails['joinDate']));
        }
        
        if (trim($playerDetails['milesRadius']) != '' && trim($playerDetails['postcode']) != '') {
            if ($playerDetails['milesRadius'] == 1) {
                $word = 'mile';
            } else {
                $word = 'miles';
            }
            $playerDetails['milesRadius'] = $playerDetails['milesRadius'] . ' ' . $word . ' of ' . strtoupper($playerDetails['postcode']); 
        }
        
        $prefs = $playerDetails['opponentPreferences'];
        $playerDetails['opponentSex'] = $this->getOpponentPrefsString($prefs, ['male', 'female']);
        $playerDetails['format'] = $this->getOpponentPrefsString($prefs, ['singles', 'doubles', 'mixedDoubles']);
        $playerDetails['availability'] = $this->getOpponentPrefsString($prefs, ['weekdayMornings', 'weekdayAfternoons', 'weekdayEvenings', 'saturday', 'sunday', 'shortNotice']);
        
        $playerDetails['availability'] = str_replace("Saturday, Sunday", 'Weekends', $playerDetails['availability']);
        $playerDetails['availability'] = str_replace('Weekday Mornings, Weekday Afternoons, Weekday Evenings, Weekends', 'Anytime', $playerDetails['availability']);
        
        return [
            'player' => $playerDetails  
        ];
    }   
    
    private function getOpponentPrefsString($prefs, $keys)
    {
        $retString = '';
        
        foreach ($keys as $key) {
            if (strtoupper($prefs[$key]) == 'Y') {
                $retString .= ucfirst($this->fromCamelCase($key)) . ', ';        
            }
        }
        
        return substr(trim($retString), 0, count($retString)-2);
    }
    
    private function fromCamelCase($camelCaseString)
    {
        $re = '/(?<=[a-z])(?=[A-Z])/x';
        $a = preg_split($re, $camelCaseString);
        return join($a, ' ');
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
