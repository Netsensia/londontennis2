<?php
namespace LondonTennis\V1\Rest\Calendar;

use Zend\Db\TableGateway\TableGateway;

class CalendarResourceFactory
{
    public function __invoke($services)
    {
        $gateway = new TableGateway(
            'usercalendar',
            $services->get('DatabaseAdapter')
        );
        
        return new CalendarResource(
            $gateway
        );
    }
}
