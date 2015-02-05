<?php
namespace Application\Adapter;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Application\Model\Identity;

class AuthAdapter implements AdapterInterface
{    
    private $username;
    
    private $password;
    
    /**
     * Sets username and password for authentication
     *
     * @return void
     */
    public function setCredentials(
        $username,
        $password
    )
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    /**
     * Performs an authentication attempt
     */
    public function authenticate()
    {
        $userId = 1;
        
        if ($userId) {
            $identity = new Identity();
            $identity->setUserId($userId);
           
            $result = new Result(
                Result::SUCCESS,
                $identity
            );
        } else {
            $result = new Result(
                Result::FAILURE,
                null,
                [$this->translate('Login failed.  Please try again.')]
            );
        }
        
        return $result;
    }
    
}
