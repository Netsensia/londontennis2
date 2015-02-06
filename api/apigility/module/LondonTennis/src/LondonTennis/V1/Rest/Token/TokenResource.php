<?php
namespace LondonTennis\V1\Rest\Token;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Select;
use Zend\Math\Rand;
use Zend\Cache\Storage\Adapter\AbstractAdapter;


class TokenResource extends AbstractResourceListener
{
    /**
     * @var AdapterInterface
     */
    private $adapter;
    
    /**
     * @param string
     */
    private $passwordSalt;
    
    /**
     * @param Zend\Cache\Storage\Adapter\AbstractAdapter
     */
    private $cache;
    
    /**
     * @param AdapterInterface $connection
     * @param string $passwordSalt
     */
    public function __construct(
        AdapterInterface $adapter,
        AbstractAdapter $cache,
        $passwordSalt
    )
    {
        $this->cache = $cache;
        $this->adapter = $adapter;
        $this->passwordSalt = $passwordSalt;        
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $email = $data->email;
        $password = $data->password;
        
        $userGateway = new TableGateway('user', $this->adapter);
        $resultSet = $userGateway->select(
            function (Select $select) use ($email, $password) {
                $select->columns(['userid'])->where(['email' => $email, 'password' => MD5($this->passwordSalt . $password)]);
            }
        )->toArray();

        if (count($resultSet) == 1) {
            $token = Rand::getString(64, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');

            $tokenEntity = new TokenEntity();

            $tokenEntity->setId($token);
            $tokenEntity->setEmail($email);
            $tokenEntity->setUserId($resultSet[0]['userid']);
            
            $this->cache->setItem($token, $tokenEntity);
            
            return $tokenEntity;
        } else {
            return new ApiProblem(401, 'Invalid login credentials');
        }
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
        $cacheSuccess = false;
        $tokenEntity = $this->cache->getItem($id, $cacheSuccess);
        
        if ($cacheSuccess) {
            return $tokenEntity;
        }
        
        return new ApiProblem(404, 'Invalid authorization token');
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
