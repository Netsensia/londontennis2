<?php
namespace LondonTennis\V1\Rest\Result;

use Application\Entity\IdName;
use Application\Entity\ToAndFromArray;

class ResultEntity
{
    use ToAndFromArray;
    
    private $id;
    
    /**
     * @var IdName
     */
    private $player1;

       /**
     * @var IdName
     */
    private $player2;
    
       /**
     * @var array
     */
    private $sets = [];
    
    private $matchDate;
    
    /**
     * @var IdName
     */
    private $venue;
    
    private $modifiedDate;
    
    private $knockoutId;
    
    private $leagueId;
    
    private $isRated;
    
    private $isWalkover;
    
       /**
     * @var IdName
     */
    private $winner;
    
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
     * @return the $player1
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param \Application\Entity\IdName $player1
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
    }

    /**
     * @return the $player2
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param \Application\Entity\IdName $player2
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
    }

    /**
     * @return the $sets
     */
    public function getSets()
    {
        return $this->sets;
    }

    /**
     * @param multitype: $sets
     */
    public function setSets($sets)
    {
        $this->sets = $sets;
    }

    /**
     * @return the $matchDate
     */
    public function getMatchDate()
    {
        return $this->matchDate;
    }

    /**
     * @param field_type $matchDate
     */
    public function setMatchDate($matchDate)
    {
        $this->matchDate = $matchDate;
    }

    /**
     * @return the $venue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param \Application\Entity\IdName $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
    }

    /**
     * @return the $modifiedDate
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @param field_type $modifiedDate
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
    }

    /**
     * @return the $knockoutId
     */
    public function getKnockoutId()
    {
        return $this->knockoutId;
    }

    /**
     * @param field_type $knockoutId
     */
    public function setKnockoutId($knockoutId)
    {
        $this->knockoutId = $knockoutId;
    }

    /**
     * @return the $leagueId
     */
    public function getLeagueId()
    {
        return $this->leagueId;
    }

    /**
     * @param field_type $leagueId
     */
    public function setLeagueId($leagueId)
    {
        $this->leagueId = $leagueId;
    }

    /**
     * @return the $isRated
     */
    public function getIsRated()
    {
        return $this->isRated;
    }

    /**
     * @param field_type $isRated
     */
    public function setIsRated($isRated)
    {
        $this->isRated = $isRated;
    }

    /**
     * @return the $isWalkover
     */
    public function getIsWalkover()
    {
        return $this->isWalkover;
    }

    /**
     * @param field_type $isWalkover
     */
    public function setIsWalkover($isWalkover)
    {
        $this->isWalkover = $isWalkover;
    }

    /**
     * @return the $winner
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * @param \Application\Entity\IdName $winner
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;
    }

}
