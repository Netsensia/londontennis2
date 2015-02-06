<?php
namespace Application\Adapter;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Application\Model\Identity;
use LondonTennis\Api\Client\Client;

class AuthAdapter implements AdapterInterface
{    
    private $email;
    
    private $password;
    
    /**
     * Sets username and password for authentication
     *
     * @return void
     */
    public function setCredentials(
        $email,
        $password
    )
    {
        $this->email = $email;
        $this->password = $password;
    }
    
    /**
     * Performs an authentication attempt
     */
    public function authenticate()
    {
        $api = new Client();
        $result = $api->authenticate($this->email, $this->password);
        
        if ($result !== false) {
            
            $identity = new Identity();
            $identity->setUserId($result['userId']);
            $identity->setUsername($result['username']);
           
            $result = new Result(
                Result::SUCCESS,
                $identity
            );
        } else {
            $result = new Result(
                Result::FAILURE,
                null,
                ['Login failed.  Please try again.']
            );
        }
        
        return $result;
    }
    
}
