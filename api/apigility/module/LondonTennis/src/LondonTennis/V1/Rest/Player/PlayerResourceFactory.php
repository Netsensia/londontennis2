<?php
namespace LondonTennis\V1\Rest\Player;

use Zend\Db\TableGateway\TableGateway;
class PlayerResourceFactory
{
    public function __invoke($services)
    {
        $gateway = new TableGateway(
            'user',
            $services->get('DatabaseAdapter')
        );
        
        return new PlayerResource(
            $gateway
        );
    }
}
