<?php
namespace Application\Entity;

class Set
{
    use ToAndFromArray;
    
    private $player1Games;
    private $player2Games;
    private $isTieBreak;
    private $setNumber;
     
    /**
     * @return the $isTieBreak
     */
    public function getIsTieBreak()
    {
        return $this->isTieBreak;
    }

    /**
     * @param field_type $isTieBreak
     */
    public function setIsTieBreak($isTieBreak)
    {
        $this->isTieBreak = $isTieBreak;
    }

    /**
     * @return the $setNumber
     */
    public function getSetNumber()
    {
        return $this->setNumber;
    }

    /**
     * @param field_type $setNumber
     */
    public function setSetNumber($setNumber)
    {
        $this->setNumber = $setNumber;
    }

    /**
     * @return the $player1Games
     */
    public function getPlayer1Games()
    {
        return $this->player1Games;
    }

    /**
     * @param field_type $player1Games
     */
    public function setPlayer1Games($player1Games)
    {
        $this->player1Games = $player1Games;
    }

    /**
     * @return the $player2Games
     */
    public function getPlayer2Games()
    {
        return $this->player2Games;
    }

    /**
     * @param field_type $player2Games
     */
    public function setPlayer2Games($player2Games)
    {
        $this->player2Games = $player2Games;
    }
}
