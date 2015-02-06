<?php
namespace LondonTennis\V1\Rest\Token;

class TokenEntity
{
    private $id;
    
    private $userId;
    
    private $email;
    
    private $username;
        
	/**
     * @return member variable $userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param field_type $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @return the $username
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

    public function getArrayCopy()
    {
        return array(
            'id'     => $this->id,
            'email' => $this->email,
            'userId' => $this->userId,
            'username' => $this->username,
        );
    }
    
    public function exchangeArray(array $array)
    {
        $this->id     = $array['id'];
        $this->email = $array['email'];
        $this->userId = $array['userId'];
        $this->username = $array['username'];
    }
}
