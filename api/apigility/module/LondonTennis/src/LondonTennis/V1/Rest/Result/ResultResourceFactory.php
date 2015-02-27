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
        
        $config = $services->get('config');
        
        return new ResultResource(
            $gateway,
            $config['zf-rest']['LondonTennis\\V1\\Rest\\Result\\Controller']['page_size']
        );
    }
}
