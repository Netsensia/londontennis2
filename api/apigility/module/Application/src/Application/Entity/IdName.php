<?php
namespace Application\Entity;

class IdName
{
    use ToAndFromArray;
    
    private $id;
    private $name;
    private $comments;
    
    public function __construct($id, $name, $comments = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->comments = $comments;
    }
    
    /**
     * @return the $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param field_type $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
