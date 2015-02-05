<?php
namespace Application\Model;

class Identity
{
    private $userid;
    
    private $email;
    
    private $username;
    
    private $apiToken;
    
    /**
     * @return member variable $userid
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param field_type $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return member variable $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

     /**
     * @return member variable $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param field_type $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return member variable $apiToken
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * @param field_type $apiToken
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }
 
}
