<?php
namespace Application\Entity;

trait ToAndFromArray
{
    public function getArrayCopy()
    {
        $arrayCopy = [];
        
        $vars = get_object_vars($this);
        
        foreach ($vars as $key => $value) {
            if (is_object($value) && method_exists($value, 'getArrayCopy')) {
                $arrayCopy[$key] = $value->getArrayCopy(); 
            } else {
                $arrayCopy[$key] = $value; 
            }
        }
        
        return $arrayCopy;
    }
    
    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
