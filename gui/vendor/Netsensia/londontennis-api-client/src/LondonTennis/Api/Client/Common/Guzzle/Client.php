<?php
namespace LondonTennis\Api\Client\Common\Guzzle;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Guzzle Client with our own defaults.
 *
 * Class Client
 * @package Opg\Lpa\Api\Client\Common\Guzzle
 */
class Client extends GuzzleClient {

    public function __construct(array $config = []){

        parent::__construct( $config );

        $this->setDefaultOption( 'exceptions', false );
        $this->setDefaultOption( 'allow_redirects', false );

        $this->setDefaultOption( 'headers/Content-Type', 'application/json' );
        $this->setDefaultOption( 'headers/Accept', 'application/json' );
        
    }

    /**
     * Sets the token as a default header value for the client.
     *
     * @param $token
     */
    public function setToken( $token )
    {
        $this->setDefaultOption( 'headers/Authorization', $token );
    }

    /**
     * Clears the default header token.
     */
    public function clearToken(){

        $this->setToken( null );

    }

} // class
