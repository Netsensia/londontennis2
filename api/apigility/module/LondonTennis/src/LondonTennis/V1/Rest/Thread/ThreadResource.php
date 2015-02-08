<?php
namespace LondonTennis\V1\Rest\Thread;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\ArrayAdapter;

class ThreadResource extends AbstractResourceListener
{
    /**
     * @var AdapterInterface
     */
    private $adapter;
    
    /**
     * @param AdapterInterface $connection
     * @param string $passwordSalt
     */
    public function __construct(
        AdapterInterface $adapter
    )
    {
        $this->adapter = $adapter;
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
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $forumId = $params['forum_id'];
        
        if (empty($forumId)) {
            return new ApiProblem(400, 'forum_id parameter is required');
        }
        
        $gateway = new TableGateway('forumthread', $this->adapter);
        
        $resultSet = $gateway->select(
            function (Select $select) use ($forumId) {
                $select
                    ->columns(['id' => 'threadid', 'subject' => 'threadsubject', 'content' => 'threaddescription', 'creatorId' => 'threadcreatorid'])
                    ->join('user', 'threadcreatorid = user.userid', ['posterName' => 'name'], 'left')
                    ->where(['threadforumid' => $forumId, 'threadishidden' => 'N']);
            }
        )->toArray();
        
        $adapter = new ArrayAdapter($resultSet);
        $collection = new ThreadCollection($adapter);

        return $collection;
        
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
