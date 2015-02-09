<?php
namespace Application\Entity;

class OpponentPreferences
{
    use ToAndFromArray;
    
       /**
     * @var boolean
     */
    private $male;
       /**
     * @var boolean
     */
    private $female;
    
       /**
     * @var boolean
     */
    private $singles;
       /**
     * @var boolean
     */
    private $doubles;
       /**
     * @var boolean
     */
    private $mixedDoubles;
    
       /**
     * @var boolean
     */
    private $weekdayMornings;
       /**
     * @var boolean
     */
    private $weekdayAfternoons;
       /**
     * @var boolean
     */
    private $weekdayEvenings;
       /**
     * @var boolean
     */
    private $saturday;
       /**
     * @var boolean
     */
    private $sunday;
    
       /**
     * @var boolean
     */
    private $shortNotice;
    
    /**
     * @return the $male
     */
    public function getMale()
    {
        return $this->male;
    }

    /**
     * @param boolean $male
     */
    public function setMale($male)
    {
        $this->male = $male;
    }

    /**
     * @return the $female
     */
    public function getFemale()
    {
        return $this->female;
    }

    /**
     * @param boolean $female
     */
    public function setFemale($female)
    {
        $this->female = $female;
    }

    /**
     * @return the $singles
     */
    public function getSingles()
    {
        return $this->singles;
    }

    /**
     * @param boolean $singles
     */
    public function setSingles($singles)
    {
        $this->singles = $singles;
    }

    /**
     * @return the $doubles
     */
    public function getDoubles()
    {
        return $this->doubles;
    }

    /**
     * @param boolean $doubles
     */
    public function setDoubles($doubles)
    {
        $this->doubles = $doubles;
    }

    /**
     * @return the $mixedDoubles
     */
    public function getMixedDoubles()
    {
        return $this->mixedDoubles;
    }

    /**
     * @param boolean $mixedDoubles
     */
    public function setMixedDoubles($mixedDoubles)
    {
        $this->mixedDoubles = $mixedDoubles;
    }

    /**
     * @return the $weekdayMornings
     */
    public function getWeekdayMornings()
    {
        return $this->weekdayMornings;
    }

    /**
     * @param boolean $weekdayMornings
     */
    public function setWeekdayMornings($weekdayMornings)
    {
        $this->weekdayMornings = $weekdayMornings;
    }

    /**
     * @return the $weekdayAfternoons
     */
    public function getWeekdayAfternoons()
    {
        return $this->weekdayAfternoons;
    }

    /**
     * @param boolean $weekdayAfternoons
     */
    public function setWeekdayAfternoons($weekdayAfternoons)
    {
        $this->weekdayAfternoons = $weekdayAfternoons;
    }

    /**
     * @return the $weekdayEvenings
     */
    public function getWeekdayEvenings()
    {
        return $this->weekdayEvenings;
    }

    /**
     * @param boolean $weekdayEvenings
     */
    public function setWeekdayEvenings($weekdayEvenings)
    {
        $this->weekdayEvenings = $weekdayEvenings;
    }

    /**
     * @return the $saturday
     */
    public function getSaturday()
    {
        return $this->saturday;
    }

    /**
     * @param boolean $saturday
     */
    public function setSaturday($saturday)
    {
        $this->saturday = $saturday;
    }

    /**
     * @return the $sunday
     */
    public function getSunday()
    {
        return $this->sunday;
    }

    /**
     * @param boolean $sunday
     */
    public function setSunday($sunday)
    {
        $this->sunday = $sunday;
    }

    /**
     * @return the $shortNotice
     */
    public function getShortNotice()
    {
        return $this->shortNotice;
    }

    /**
     * @param boolean $shortNotice
     */
    public function setShortNotice($shortNotice)
    {
        $this->shortNotice = $shortNotice;
    }
}
