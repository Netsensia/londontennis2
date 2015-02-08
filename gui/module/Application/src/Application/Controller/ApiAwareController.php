<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use LondonTennis\Api\Client\Client;

class ApiAwareController extends AbstractActionController
{
    /**
     * 
     * @var LondonTennis\Api\Client\Client
     */
    private $apiClient;
    
    /**
     * 
     * @param LondonTennis\Api\Client\Client $client
     */
    public function setApiClient(
        Client $client
    )
    {
        $this->apiClient = $client;
    }
    
    protected function api()
    {
        return $this->apiClient;
    }
}
