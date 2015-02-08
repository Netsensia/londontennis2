<?php
namespace LondonTennis\V1\Rest\Thread;

class ThreadEntity
{
    private $id;
    
    private $creatorId;
    
    private $subject;
    
    private $content;
    
    private $creatorName;
    
    private $lastPostTime;
    
    private $creatorName;
    
    private $lastPosterId;
    
    private $lastPosterName;
    
    private $postCount;
    
    /**
     * @return the $postCount
     */
    public function getPostCount()
    {
        return $this->postCount;
    }

    /**
     * @param field_type $postCount
     */
    public function setPostCount($postCount)
    {
        $this->postCount = $postCount;
    }

    /**
     * @return the $lastPostTime
     */
    public function getLastPostTime()
    {
        return $this->lastPostTime;
    }

    /**
     * @param field_type $lastPostTime
     */
    public function setLastPostTime($lastPostTime)
    {
        $this->lastPostTime = $lastPostTime;
    }

    /**
     * @return the $creatorName
     */
    public function getCreatorName()
    {
        return $this->creatorName;
    }

    /**
     * @param field_type $creatorName
     */
    public function setCreatorName($creatorName)
    {
        $this->creatorName = $creatorName;
    }

    /**
     * @return the $lastPosterId
     */
    public function getLastPosterId()
    {
        return $this->lastPosterId;
    }

    /**
     * @param field_type $lastPosterId
     */
    public function setLastPosterId($lastPosterId)
    {
        $this->lastPosterId = $lastPosterId;
    }

    /**
     * @return the $lastPosterName
     */
    public function getLastPosterName()
    {
        return $this->lastPosterName;
    }

    /**
     * @param field_type $lastPosterName
     */
    public function setLastPosterName($lastPosterName)
    {
        $this->lastPosterName = $lastPosterName;
    }

    /**
     * @return the $creatorName
     */
    public function getCreatorName()
    {
        return $this->creatorName;
    }

    /**
     * @param field_type $creatorName
     */
    public function setCreatorName($creatorName)
    {
        $this->creatorName = $creatorName;
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
