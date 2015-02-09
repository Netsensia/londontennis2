<?php
namespace LondonTennis\V1\Rest\Player;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

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
                        'createdTime' => 'createddate',
                        'lastPlayedTime' => 'lastplayed',
                        'isAdmin' => 'isadmin',
                        'name' => 'name',
                        'dateOfBirth' => 'dob',
                        'profileText' => 'profiletext',
                        'profileImage' => 'forumavatarurl',
                        'lastActiveTime' => 'lastactivedate',
                        'ltaNumber' => 'ltanumber',
                        'parkRating' => 'parkrating',
                        'ltaRating' => 'ltarating',
                        'siteRank' => 'siterank',
                ])
                ->where(['userid' => $id]);
            }
        )->toArray();
        
        if (count($resultSet) == 0) {
            return new ApiProblem(404, 'Player not found');
        }
        
        if (count($resultSet) > 1) {
            return new ApiProblem(500, 'More than one player found');
        }
        
        $player = new PlayerEntity();
        $player->exchangeArray($resultSet[0]);
        
        $player->setProfileImage('http://www.londontennis.co.uk/' . $player->getProfileImage());
        
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
