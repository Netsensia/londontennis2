<?php
namespace Application\Service;

class ResultsService extends ApiAwareService
{
    public function getResultsForPlayer($playerId)
    {
        $results = $this->api()->getResults(1, $playerId)['_embedded']['result'];
        
        foreach ($results as &$result) {

            if ($result['leagueId'] > 0) {
                $result['type'] = 'League';
                continue;
            }
            
            if ($result['knockoutId'] > 0) {
                $result['type'] = 'Knockout';
                continue;
            }
            
            $result['type'] = 'Friendly';
            
        }
        
        return $results;
    }
    
    public function getResultsForTwoPlayers($player1Id, $player2Id)
    {
        $results = $this->api()->getResults(1, $player1Id, $player2Id)['_embedded']['result'];
    
        foreach ($results as &$result) {
    
            if ($result['leagueId'] > 0) {
                $result['type'] = 'League';
                continue;
            }
    
            if ($result['knockoutId'] > 0) {
                $result['type'] = 'Knockout';
                continue;
            }
    
            $result['type'] = 'Friendly';
    
        }
    
        return $results;
    }
}
