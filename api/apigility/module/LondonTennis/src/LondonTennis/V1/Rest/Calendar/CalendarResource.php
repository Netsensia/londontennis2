<?php
namespace LondonTennis\V1\Rest\Calendar;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\ArrayAdapter;

class CalendarResource extends AbstractResourceListener
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
        $userId = $params['userId'];
        $startDate = $params['startDate'];
        
        $resultSet = $this->gateway->select(
            function (Select $select) use ($userId, $startDate) {
                $select->columns([
                    'morning',
                    'afternoon',
                    'evening',
                    'matchType' => 'type',
                    'date' => 'matchDate',
                    'id' => 'matchDate',
                ])
                ->order('date ASC')
                ->limit(30)
                ->where->greaterThan('matchdate', $startDate)
                ->and->equalTo('userid', $userId);
            }
        )->toArray();
    
        $entities = [];
    
        foreach ($resultSet as $row) {
            $entity = new CalendarEntity();
            $entity->exchangeArray($row);
            $entities[] = $entity;
        }
    
        $adapter = new ArrayAdapter($entities);
        $collection = new CalendarCollection($adapter);
        
        return $collection;
    }
}
