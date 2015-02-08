<?php
namespace Application\Entity;

trait ToAndFromArray
{
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }
}
