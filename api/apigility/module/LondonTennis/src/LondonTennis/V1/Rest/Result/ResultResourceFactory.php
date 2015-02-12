<?php
namespace LondonTennis\V1\Rest\Result;

use Zend\Db\TableGateway\TableGateway;

class ResultResourceFactory
{
    public function __invoke($services)
    {
        $gateway = new TableGateway(
            'tennismatch',
            $services->get('DatabaseAdapter')
        );
        
        return new ResultResource(
            $gateway
        );
    }
}
