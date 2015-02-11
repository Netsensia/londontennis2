<?php
namespace Application\Service;

class CalendarService extends ApiAwareService
{
    public function getCalendarForUser($userId)
    {
        // @todo
        $startDate = date('Ymd');
        $startDate = '20100202';
        
        return $this->api()->getCalendarEntries($userId, $startDate);
    }
    
    public function getCalendar()
    {
        return $this->api()->getCalendarEntries(null, date('Ymd'));
    }
}
