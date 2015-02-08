<?php
namespace LondonTennis\V1\Rest\Post;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Db\Adapter\AdapterInterface;

class PostResource extends AbstractResourceListener
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
        $threadId = $params['thread_id'];
        
        if (empty($threadId)) {
            return new ApiProblem(400, 'thread_id parameter is required');
        }
        
        $gateway = new TableGateway('forumpost', $this->adapter);
        
        $resultSet = $gateway->select(
            function (Select $select) use ($threadId) {
                $select
                    ->columns([
                        'id' => 'postid',
                        'content' => 'postcontent',
                        'postedTime' => 'posteddate',
                        'posterId' => 'posterid',
                        'editCount' => 'posteditcount',
                        'alterCount' => 'postalertcount',
                        'editTime' => 'posteditdate',
                        'recommendations' => 'postrecs',
                    ])
                    ->join('user', 'posterid = userid', ['posterName' => 'name'], 'left')
                    ->where(['postthreadid' => $threadId, 'postishidden' => 'N']);
            }
        )->toArray();
        
        $adapter = new ArrayAdapter($resultSet);
        $collection = new PostCollection($adapter);

        return $collection;
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
