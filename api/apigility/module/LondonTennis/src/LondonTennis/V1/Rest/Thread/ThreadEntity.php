<?php
namespace LondonTennis\V1\Rest\Thread;

class ThreadEntity
{
    private $id;
    
    private $creatorId;
    
    private $subject;
    
    private $content;
    
    private $posterName;
    
    /**
     * @return the $posterName
     */
    public function getPosterName()
    {
        return $this->posterName;
    }

    /**
     * @param field_type $posterName
     */
    public function setPosterName($posterName)
    {
        $this->posterName = $posterName;
    }

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
     * @return the $creatorId
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @param field_type $creatorId
     */
    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }

    /**
     * @return the $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param field_type $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param field_type $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

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
