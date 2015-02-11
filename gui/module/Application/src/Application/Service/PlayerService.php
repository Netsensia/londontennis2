<?php
namespace Application\Service;

class PlayerService extends ApiAwareService
{
    public function getPlayerDetails($playerId)
    {
        $playerDetails = $this->api()->getPlayerDetails($playerId);
        
        if (trim($playerDetails['userRating']) != '') {
            $playerDetails['userRating'] = 'ITN ' . $playerDetails['userRating'];
        }
        
        if (trim($playerDetails['joinDate']) != '') {
            $playerDetails['joinDate'] = date('M j, Y', strtotime($playerDetails['joinDate']));
        }
        
        if (trim($playerDetails['lastPlayedTime']) == '0000-00-00') {
            $playerDetails['lastPlayedTime'] = 'N/A';
        } else
        if (trim($playerDetails['lastPlayedTime']) != '') {
            $playerDetails['lastPlayedTime'] = date('M j, Y', strtotime($playerDetails['lastPlayedTime']));
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
        
        if ($playerDetails['siteRank'] == 100000) {
            $playerDetails['siteRank'] = 'Unrated';
        }
        
        return $playerDetails;
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
}
