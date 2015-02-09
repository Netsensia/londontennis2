<?php
namespace LondonTennis\V1\Rest\Player;

use Application\Entity\ToAndFromArray;

class PlayerEntity
{
    use ToAndFromArray;

    /**
     * Uneditable
     */
    private $id;
    private $createdTime;
    private $lastPlayedTime;
    
    /**
     * Admin only
     */
    private $isAdmin;
    
    private $name;
    private $sex;
    private $dateOfBirth;
    private $profileText;
    private $profileImage;
    private $lastActiveTime;
    private $ltaNumber;
    private $parkRating;
    private $ltaRating;
    private $siteRank;
    
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
     * @return the $createdTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param field_type $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }

    /**
     * @return the $lastPlayedTime
     */
    public function getLastPlayedTime()
    {
        return $this->lastPlayedTime;
    }

    /**
     * @param field_type $lastPlayedTime
     */
    public function setLastPlayedTime($lastPlayedTime)
    {
        $this->lastPlayedTime = $lastPlayedTime;
    }

    /**
     * @return the $isAdmin
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param field_type $isAdmin
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return the $sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param field_type $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return the $dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param field_type $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    /**
     * @return the $profileText
     */
    public function getProfileText()
    {
        return $this->profileText;
    }

    /**
     * @param field_type $profileText
     */
    public function setProfileText($profileText)
    {
        $this->profileText = $profileText;
    }

    /**
     * @return the $profileImage
     */
    public function getProfileImage()
    {
        return $this->profileImage;
    }

    /**
     * @param field_type $profileImage
     */
    public function setProfileImage($profileImage)
    {
        $this->profileImage = $profileImage;
    }

    /**
     * @return the $lastActiveTime
     */
    public function getLastActiveTime()
    {
        return $this->lastActiveTime;
    }

    /**
     * @param field_type $lastActiveTime
     */
    public function setLastActiveTime($lastActiveTime)
    {
        $this->lastActiveTime = $lastActiveTime;
    }

    /**
     * @return the $ltaNumber
     */
    public function getLtaNumber()
    {
        return $this->ltaNumber;
    }

    /**
     * @param field_type $ltaNumber
     */
    public function setLtaNumber($ltaNumber)
    {
        $this->ltaNumber = $ltaNumber;
    }

    /**
     * @return the $parkRating
     */
    public function getParkRating()
    {
        return $this->parkRating;
    }

    /**
     * @param field_type $parkRating
     */
    public function setParkRating($parkRating)
    {
        $this->parkRating = $parkRating;
    }

    /**
     * @return the $ltaRating
     */
    public function getLtaRating()
    {
        return $this->ltaRating;
    }

    /**
     * @param field_type $ltaRating
     */
    public function setLtaRating($ltaRating)
    {
        $this->ltaRating = $ltaRating;
    }

    /**
     * @return the $siteRank
     */
    public function getSiteRank()
    {
        return $this->siteRank;
    }

    /**
     * @param field_type $siteRank
     */
    public function setSiteRank($siteRank)
    {
        $this->siteRank = $siteRank;
    }


}
