<?php
namespace LondonTennis\Api\Client;

use LondonTennis\Api\Client\Common\Guzzle\Client as GuzzleClient;
use GuzzleHttp\Message\Response;

class Client
{

    const PATH_API = 'http://api.londontennis2.local';

    /**
     * The API auth token
     * 
     * @var string
     */
    private $token;
    
    /**
     * The email of the logged in account
     * 
     * @var string
     */
    private $email;
    
    /**
     * The user ID of the logged in account
     *
     * @var string
     */
    private $userId;

    /**
     * 
     * @var GuzzleClient
     */
    private $guzzleClient;
    
    /**
     * The status code from the last API call
     * 
     * @var number
     */
    private $lastStatusCode;
    
    /**
     * The content body from the last API call
     * 
     * @var string
     */
    private $lastContent;
    
    /**
     * Did the last API call return with an error?
     * 
     * @var boolean
     */
    private $isError;
    
    /**
     * Create an API client for the given uri endpoint.
     * 
     * Optionally pass in a previously-obtained token. If no token is provided,
     * you will need to call the authenticate(...) function
     * 
     * @param string $token  The API auth token
     */
    public function __construct(
        $token = null
    )
    {
        $this->setToken($token);

    }

    /**
     * Returns the GuzzleClient.
     *
     * If a authentication token is available it will be preset in the HTTP header.
     *
     * @return GuzzleClient
     */
    private function client()
    {

        if( !isset($this->guzzleClient) ) {
            $this->guzzleClient = new GuzzleClient();
        }

        if( $this->getToken() != null ) {
            $this->guzzleClient->setToken( $this->getToken() );
        }

        return $this->guzzleClient;

    }
    
    /**
     * Authenticate against the authentication server and store the token
     * for future calls.
     *
     * @param string $email
     * @param string $password
     *
     * @return AuthResponse
     */
    public function authenticate(
        $email,
        $password
    )
    {
        $response = $this->client()->post( self::PATH_API . '/token', 
            [
                'json' => [
                    'email' => strtolower($email),
                    'password' => $password,
                ]
            ]
        );
        
        if( $response->getStatusCode() != 201 ) {
            return $this->log(false, [
                'error' => 'Authentication Failed',
                'code'=> $response->getStatusCode(),
            ]);
        }
        
        $json = json_decode($response->getBody());
        
        $this->setToken( $json->id );
        $this->setEmail( $email );

        //-------------------------
        // Get the user's details

        $responseJson = $this->getTokenInfo($this->getToken());

        if( $responseJson === false ){
            return $this->log(false, [
                'error' => 'Authentication Failed',
                'code'=> $response->getStatusCode(),
            ]);
        }
        
        if( !isset($responseJson['userId']) ){
            return $this->log(false, [
                'error' => 'Authentication Failed',
                'code'=> $response->getStatusCode(),
            ]);
        }

        $this->setUserId($responseJson['userId']);
        
        return [
            'userId' => $this->getUserId(),
            'token' => $this->getToken(),
            'email' => $this->getEmail(),
            'username' => $responseJson['username'],
        ];
    }

    /**
     * Gets all the info relating to a token from the authentication service.
     *
     * @param string $token
     * @return array|boolean Token details or false if token invalid
     */
    public function getTokenInfo($token)
    {

        $response = $this->client()->get( self::PATH_API . '/token/' . $token, []);

        if( $response->getStatusCode() != 200 ){
            return false;
        }

        return $response->json();

    }
    
    /**
     * Set the email and user id from the current token
     *
     * @return boolean
     */
    private function setEmailAndUserIdFromToken()
    {

        $response = $this->getTokenInfo( $this->token );
    
        if( !isset($response['user_id']) ){
            return false;
        }
        
        if( !isset($response['username']) ){
            return false;
        }
    
        $this->setEmail($response['username']);
        $this->setUserId($response['user_id']);
        
        return true;
    }
    
    /**
     * @return member variable $token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setToken($token)
    {
        $this->token = $token;
        
        return $this;
    }

    /**
     * @return the $lastStatusCode
     */
    public function getLastStatusCode()
    {
        return $this->lastStatusCode;
    }

    /**
     * @param number $lastStatusCode
     */
    private function setLastStatusCode($lastStatusCode)
    {
        $this->lastStatusCode = $lastStatusCode;
    }

     /**
     * @return the $lastContent
     */
    public function getLastContent()
    {
        return $this->lastContent;
    }

    /**
     * @param string $lastContent
     */
    private function setLastContent($lastContent)
    {
        $this->lastContent = $lastContent;
    }
    
    /**
     * @return $isError
     */
    public function isError()
    {
        return $this->isError;
    }
    
    /**
     * @param boolean $isError
     */
    private function setIsError($isError)
    {
        $this->isError = $isError;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        if (is_null($this->email) && !is_null($this->token)) {
            $this->setEmailAndUserIdFromToken();
        }
        
        return $this->email;
    }
    
    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @return the $userId
     */
    public function getUserId()
    {
        if (is_null($this->userId) && !is_null($this->token)) {
            $this->setEmailAndUserIdFromToken();
        }
        
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Log the response of the API call and set some internal member vars
     * If content body is JSON, convert it to an array
     * 
     * @param Response $response
     * @param bool $isSuccess
     * @return boolean
     * 
     * @todo - External logging
     */
    public function log($isSuccess, $details)
    {
        return $isSuccess;
    }
}
