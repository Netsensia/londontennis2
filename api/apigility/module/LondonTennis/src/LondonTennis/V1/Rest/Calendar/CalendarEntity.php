<?php
namespace LondonTennis\V1\Rest\Calendar;

use Application\Entity\ToAndFromArray;

class CalendarEntity
{
    use ToAndFromArray;
    
    private $id;
    private $date;
    private $morning;
    private $afternoon;
    private $evening;
    private $matchType;
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return the $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param field_type $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return the $morning
     */
    public function getMorning()
    {
        return $this->morning;
    }

    /**
     * @param field_type $morning
     */
    public function setMorning($morning)
    {
        $this->morning = $morning;
    }

    /**
     * @return the $afternoon
     */
    public function getAfternoon()
    {
        return $this->afternoon;
    }

    /**
     * @param field_type $afternoon
     */
    public function setAfternoon($afternoon)
    {
        $this->afternoon = $afternoon;
    }

    /**
     * @return the $evening
     */
    public function getEvening()
    {
        return $this->evening;
    }

    /**
     * @param field_type $evening
     */
    public function setEvening($evening)
    {
        $this->evening = $evening;
    }

    /**
     * @return the $matchType
     */
    public function getMatchType()
    {
        return $this->matchType;
    }

    /**
     * @param field_type $matchType
     */
    public function setMatchType($matchType)
    {
        $this->matchType = $matchType;
    }

}
