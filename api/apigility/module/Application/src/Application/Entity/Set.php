<?php
namespace Application\Entity;

class Set
{
    use ToAndFromArray;
    
    private $player1games;
    private $player2games;
    
    /**
     * @return the $player1games
     */
    public function getPlayer1games()
    {
        return $this->player1games;
    }

    /**
     * @param field_type $player1games
     */
    public function setPlayer1games($player1games)
    {
        $this->player1games = $player1games;
    }

    /**
     * @return the $player2games
     */
    public function getPlayer2games()
    {
        return $this->player2games;
    }

    /**
     * @param field_type $player2games
     */
    public function setPlayer2games($player2games)
    {
        $this->player2games = $player2games;
    }
}
