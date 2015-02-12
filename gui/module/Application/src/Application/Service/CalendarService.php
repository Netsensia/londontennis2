<?php
namespace Application\Service;

class CalendarService extends ApiAwareService
{
    public function getCalendarForUser($userId)
    {
        // @todo
        $startDate = date('Ymd');
        $startDate = '20100202';
        
        $entries = $this->api()->getCalendarEntries($userId, $startDate)['_embedded']['calendar'];
        foreach ($entries as &$entry) {
            switch ($entry['matchType']) {
                case '': $entry['matchType'] = ''; break;
                case 0: $entry['matchType'] = 'Any'; break;
                case 1: $entry['matchType'] = 'Friendly'; break;
                case 2: $entry['matchType'] = 'League or Knockout'; break;
            }
        }
        
        return $entries;
    }

}
