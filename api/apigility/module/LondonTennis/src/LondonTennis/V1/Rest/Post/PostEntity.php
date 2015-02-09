<?php
namespace LondonTennis\V1\Rest\Post;

use Application\Entity\ToAndFromArray;

class PostEntity
{
    use ToAndFromArray;
    
    private $id;
    private $postedTime;
    private $posterId;
    private $editCount;
    private $alertCount;
    private $editTime;
    private $recommendations;
    private $posterName;
    
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
     * @return the $postedTime
     */
    public function getPostedTime()
    {
        return $this->postedTime;
    }

    /**
     * @param field_type $postedTime
     */
    public function setPostedTime($postedTime)
    {
        $this->postedTime = $postedTime;
    }

    /**
     * @return the $posterId
     */
    public function getPosterId()
    {
        return $this->posterId;
    }

    /**
     * @param field_type $posterId
     */
    public function setPosterId($posterId)
    {
        $this->posterId = $posterId;
    }

    /**
     * @return the $editCount
     */
    public function getEditCount()
    {
        return $this->editCount;
    }

    /**
     * @param field_type $editCount
     */
    public function setEditCount($editCount)
    {
        $this->editCount = $editCount;
    }

    /**
     * @return the $alertCount
     */
    public function getAlertCount()
    {
        return $this->alertCount;
    }

    /**
     * @param field_type $alertCount
     */
    public function setAlertCount($alertCount)
    {
        $this->alertCount = $alertCount;
    }

    /**
     * @return the $editTime
     */
    public function getEditTime()
    {
        return $this->editTime;
    }

    /**
     * @param field_type $editTime
     */
    public function setEditTime($editTime)
    {
        $this->editTime = $editTime;
    }

    /**
     * @return the $recommendations
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * @param field_type $recommendations
     */
    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;
    }

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

}
