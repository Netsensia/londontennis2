<?php
namespace LondonTennis\V1\Rest\Result;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Db\Sql\Where;

class ResultResource extends AbstractResourceListener
{
    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    private $gateway;
    
    /**
     * @param \Zend\Db\TableGateway\TableGateway $connection
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
                
                if (count($players) == 1) {
                    $where->equalTo('tennismatchplayer.userid', $players[0]);
                }
                
                if (count($players) == 2) {
                    $where->and->equalTo('tennismatchplayer.userid', $players[1]);
                }
                
                $select->columns([
                    'matchid',
                    'player1',
                    'player2',
                ])
                ->quantifier(\Zend\Db\Sql\Select::QUANTIFIER_DISTINCT)
                ->join(['a' => 'user'], 'tennismatch.player1 = a.userid', ['player1Name' => 'name'])
                ->join(['b' => 'user'], 'tennismatch.player2 = b.userid', ['player2Name' => 'name'])
                ->join('tennismatchplayer', 'tennismatch.matchid = tennismatchplayer.matchid', [])
                ->where($where);
                
            }
        )->toArray();
        
        return new ResultCollection(new ArrayAdapter($resultSet));
    }
}
