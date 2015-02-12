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
        
        if (empty($startDate)) {
            return new ApiProblem(400, 'startDate parameter is required');
        }
        
        if (empty($userId)) {
            return new ApiProblem(400, 'userId parameter is required');
        }
        
        $endDate = date('Y-m-d', strtotime("+1 month", strtotime($startDate)));
        
        $resultSet = $this->gateway->select(
            function (Select $select) use ($userId, $startDate, $endDate) {
                $select->columns([
                    'morning',
                    'afternoon',
                    'evening',
                    'matchType' => 'type',
                    'date' => 'matchdate',
                    'id' => 'matchdate',
                ])
                ->order('date ASC')
                ->where->greaterThan('matchdate', $startDate)
                ->and->lessThan('matchdate', $endDate);
                
                if (!empty($userId)) {
                    $select->where->and->equalTo('userid', $userId);
                }
            }
        )->toArray();
    
        $entities = [];
        
        for ($i=0; $i<28; $i++) {
            $calendarDate = date('Y-m-d', strtotime('+' . $i . 'days', strtotime($startDate)));
            
            $entity = new CalendarEntity();
            $entity->setId(uniqid());
            $entity->setDate($calendarDate);
            $entities[] = $entity;
            
            foreach ($resultSet as $row) {
                $rowDate = date('Y-m-d', strtotime($row['date']));
                if ($rowDate == $calendarDate) {
                    $entity->exchangeArray($row);
                    break;
                }
            }
            
        }
    
        $adapter = new ArrayAdapter($entities);
        $collection = new CalendarCollection($adapter);
        
        return $collection;
    }
}
