<?php
namespace LondonTennis\V1\Rest\Result;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Db\Sql\Where;
use Application\Entity\IdName;
use Application\Entity\Set;
use Application\Entity\SetCollection;

class ResultResource extends AbstractResourceListener
{
    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    private $gateway;
    
    /**
     * @param number
     */
    private $pageSize;
    
    /**
     * @param \Zend\Db\TableGateway\TableGateway $connection
     */
    public function __construct(
        \Zend\Db\TableGateway\TableGateway $gateway,
        $pageSize
    )
    {
        $this->gateway = $gateway;
        $this->pageSize = $pageSize;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
    
    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $players = $params['players'];
        
        $resultSet = $this->gateway->select(
            function (Select $select) use ($players) {
                
                $where = new Where();
                
                if (count($players) > 0) {
                    $where->equalTo('tennismatchplayer.userid', $players[0]);
                }
                
                $select->columns([
                    'matchid',
                    'matchdate',
                    'player1',
                    'player2',
                    'venueid',
                    'competitionid',
                    'knockoutid',
                    'israted',
                    'winner',
                    'iswalkover',
                ])
                ->quantifier(\Zend\Db\Sql\Select::QUANTIFIER_DISTINCT)
                ->join('tennismatchplayer', 'tennismatch.matchid = tennismatchplayer.matchid', [])
                ->join(['a' => 'user'], 'tennismatch.player1 = a.userid', ['player1Name' => 'name'])
                ->join(['b' => 'user'], 'tennismatch.player2 = b.userid', ['player2Name' => 'name'])
                ->join('club', 'tennismatch.venueid = club.clubid', ['venueName' => 'name'])
                ->where($where);
                
            }
        )->toArray();
        
        // filter for second player, if any
        $matches = [];
        
        foreach ($resultSet as $result) {
           if (count($players) > 1 && $result['player1'] != $players[1] && $result['player2'] != $players[1]) {
               continue;
           }
           $entity = new ResultEntity();
           $entity->setId($result['matchid']);
           $entity->setMatchDate($result['matchdate']);
           $entity->setPlayer1(new IdName($result['player1'], $result['player1Name']));
           $entity->setPlayer2(new IdName($result['player2'], $result['player2Name']));
           $entity->setVenue(new IdName($result['venueid'], $result['venueName']));
           $entity->setLeagueId($result['competitionid']);
           $entity->setKnockoutId($result['knockoutid']);
           $entity->setIsRated(strtolower($result['israted']) == 'y');
           $entity->setIsWalkover(strtolower($result['iswalkover']) == 'y');
           
           $matches[] = $entity;
        }
        
        $collection = new ResultCollection(new ArrayAdapter($matches));
        $collection->setItemCountPerPage($this->pageSize);
        
        // Add set scores for results on the current page
        for ($i=1; $i<=$this->pageSize; $i++) {
            $item = $collection->getItem($i, $params['page']);
            
            $matchId = $item->getId();
            
            $resultSet = $this->gateway->select(
                function (Select $select) use ($matchId) {
                    $select->columns([])
                        ->join('tennismatchset', 'tennismatch.matchid = tennismatchset.matchid', ['setnumber', 'player1Games', 'player2Games', 'tiebreak'])
                        ->where(['tennismatchset.matchid' => $matchId]);
                }
            )->toArray();

            $setCollection = new SetCollection();
            foreach ($resultSet as $result) {
                $set = new Set();
                
                $set->setIsTieBreak(strtolower($result['tiebreak']) == 'y');
                $set->setSetNumber($result['setnumber'] + 1);
                $set->setPlayer1Games($result['player1Games']);
                $set->setPlayer2Games($result['player2Games']);
                
                $setCollection->addSet($set);
            }
            
            $item->setSets($setCollection);
        }
        
        return $collection;
    }
}
