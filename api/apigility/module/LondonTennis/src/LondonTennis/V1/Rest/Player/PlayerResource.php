<?php
namespace LondonTennis\V1\Rest\Player;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Application\Entity\OpponentPreferences;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Expression;

class PlayerResource extends AbstractResourceListener
{
    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    private $gateway;
    
    /**
     * @param AdapterInterface $connection
     * @param string $passwordSalt
     */
    public function __construct(
        \Zend\Db\TableGateway\TableGateway $gateway
    )
    {
        $this->gateway = $gateway;
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
        $resultSet = $this->gateway->select(
            function (\Zend\Db\Sql\Select $select) use ($id) {
                $select
                    ->columns([
                        'id' => 'userid',
                        'joinDate' => 'createddate',
                        'lastPlayedTime' => 'lastplayed',
                        'isAdmin' => 'isadmin',
                        'name' => 'name',
                        'sex' => 'sex',
                        'milesRadius' => 'postcodemiles',
                        'postcode' => 'postcode',
                        'dateOfBirth' => 'dob',
                        'profileText' => 'profiletext',
                        'profileImage' => 'forumavatarurl',
                        'lastActiveTime' => 'lastactivedate',
                        'ltaNumber' => 'ltanumber',
                        'userRating' => 'parkrating',
                        'ltaRating' => 'ltarating',
                        'rankingPoints' => 'elo',
                        'siteRank' => 'siterank',
                        'male' => 'opponent_male',
                        'female' => 'opponent_female',
                        'doubles' => 'play_doubles',
                        'singles' => 'play_singles',
                        'mixedDoubles' => 'play_mixeddoubles',
                        'weekdayMornings' => 'play_wdmorn',
                        'weekdayAfternoons' => 'play_wdafternoon',
                        'weekdayEvenings' => 'play_wdevening',
                        'saturday' => 'play_saturday',
                        'sunday' => 'play_sunday',
                        'shortNotice' => 'play_shortnotice',
                    ])
                    ->where(['user.userid' => $id]);
            }
        )->toArray();
        
        if (count($resultSet) == 0) {
            return new ApiProblem(404, 'Player not found');
        }
        
        if (count($resultSet) > 1) {
            return new ApiProblem(500, 'More than one player found');
        }
        
        $row = $resultSet[0];
        
        $player = new PlayerEntity();
        $player->exchangeArray($row);
        
        $opponentPreferences = new OpponentPreferences();
        $opponentPreferences->exchangeArray($row);
        
        if ($player->getSiteRank() != 100000) {
            $maxRank = $this->gateway->select(
                function (\Zend\Db\Sql\Select $select) use ($id) {
                    $select->columns(['maxRank' => new Expression('MAX(siterank)')])
                           ->where->lessThan('siterank', 100000);
                }
            )->toArray()[0]['maxRank'];
    
            $percentile = ceil(100 * ($player->getSiteRank() / $maxRank));
            $player->setPercentile($percentile);
        }
        
        $player->setOpponentPreferences($opponentPreferences);
        
        $resultSet = $this->gateway->select(
            function (\Zend\Db\Sql\Select $select) use ($id) {
                $select
                ->columns(['c' => new Expression('COUNT(*)')])
                ->join('tennismatchplayer', 'user.userid = tennismatchplayer.userid', ['winorlose'])
                ->join('tennismatch', 'tennismatchplayer.matchid = tennismatch.matchid')
                ->where(['user.userid' => $id, 'tennismatch.ishidden' => 'N'])
                ->group(['winorlose']);
            }
        )->toArray();
        
        foreach ($resultSet as $row) {
            switch ($row['winorlose']) {
                case 'W' : $player->setMatchesWon($row['c']); break;
                case 'L' : $player->setMatchesLost($row['c']); break;
                case 'D' : $player->setMatchesDrawn($row['c']); break;
            }
        }
        
        $resultSet = $this->gateway->select(
            function (\Zend\Db\Sql\Select $select) use ($id) {
                $select
                    ->columns(['userid'])
                    ->join('userclub', 'user.userid = userclub.userid', ['homeClubId' => 'clubid'])
                    ->join('club', 'userclub.clubid = club.clubid', ['clubid', 'homeClubName' => 'name'])
                    ->where(['user.userid' => $id, 'isfavourite' => 'Y']);
            }
        )->toArray();
        
        if (count($resultSet) == 1) {
            $player->setHomeClubId($resultSet[0]['homeClubId']);
            $player->setHomeClubName($resultSet[0]['homeClubName']);
        }
        
        return $player;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return new ApiProblem(405, 'The GET method has not been defined for collections');
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
}
