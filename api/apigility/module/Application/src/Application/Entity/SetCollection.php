<?php
namespace Application\Entity;

class SetCollection
{
    use ToAndFromArray;
    
    /**
     * @var array
     */
    private $sets = [];
    
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
     * @param Set $set
     */
    public function addSet($set)
    {
        $this->sets[] = $set;
    }
    
    public function getArrayCopy()
    {
        $array = [];
        
        foreach ($this->sets as $set) {
            $array[] = $set->getArrayCopy();
        }
        
        return $array;
    }
     
}
