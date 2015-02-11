<?php
namespace LondonTennis\V1\Rest\Player;

use Application\Entity\ToAndFromArray;
use Application\Entity\OpponentPreferences;

class PlayerEntity
{
    use ToAndFromArray;

    /**
     * Uneditable
     */
    private $id;
    private $joinDate;
    private $lastPlayedTime;
    private $percentile;
    private $siteRank;
    private $rankingPoints;
    private $matchesWon = 0;
    private $matchesDrawn = 0;
    private $matchesLost = 0;
    
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
    private $userRating;
    private $ltaRating;
    private $milesRadius;
    private $postcode;
    
    /**
     * @var OpponentPreferences
     */
    private $opponentPreferences;
    
    private $homeClubId;
    private $homeClubName;
    
    /**
     * @return the $matchesWon
     */
    public function getMatchesWon()
    {
        return $this->matchesWon;
    }

    /**
     * @param field_type $matchesWon
     */
    public function setMatchesWon($matchesWon)
    {
        $this->matchesWon = $matchesWon;
    }

    /**
     * @return the $matchesDrawn
     */
    public function getMatchesDrawn()
    {
        return $this->matchesDrawn;
    }

    /**
     * @param field_type $matchesDrawn
     */
    public function setMatchesDrawn($matchesDrawn)
    {
        $this->matchesDrawn = $matchesDrawn;
    }

    /**
     * @return the $matchesLost
     */
    public function getMatchesLost()
    {
        return $this->matchesLost;
    }

    /**
     * @param field_type $matchesLost
     */
    public function setMatchesLost($matchesLost)
    {
        $this->matchesLost = $matchesLost;
    }

    /**
     * @return the $percentile
     */
    public function getPercentile()
    {
        return $this->percentile;
    }

    /**
     * @param field_type $percentile
     */
    public function setPercentile($percentile)
    {
        $this->percentile = $percentile;
    }

    /**
     * @return the $rankingPoints
     */
    public function getRankingPoints()
    {
        return $this->rankingPoints;
    }

    /**
     * @param field_type $rankingPoints
     */
    public function setRankingPoints($rankingPoints)
    {
        $this->rankingPoints = $rankingPoints;
    }

    /**
     * @return the $homeClubId
     */
    public function getHomeClubId()
    {
        return $this->homeClubId;
    }

    /**
     * @param field_type $homeClubId
     */
    public function setHomeClubId($homeClubId)
    {
        $this->homeClubId = $homeClubId;
    }

    /**
     * @return the $homeClubName
     */
    public function getHomeClubName()
    {
        return $this->homeClubName;
    }

    /**
     * @param field_type $homeClubName
     */
    public function setHomeClubName($homeClubName)
    {
        $this->homeClubName = $homeClubName;
    }

    /**
     * @return the $opponentPreferences
     */
    public function getOpponentPreferences()
    {
        return $this->opponentPreferences;
    }

    /**
     * @param OpponentPreferences $opponentPreferences
     */
    public function setOpponentPreferences($opponentPreferences)
    {
        $this->opponentPreferences = $opponentPreferences;
    }

    /**
     * @return the $postcode
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param field_type $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return the $milesRadius
     */
    public function getMilesRadius()
    {
        return $this->milesRadius;
    }

    /**
     * @param field_type $milesRadius
     */
    public function setMilesRadius($milesRadius)
    {
        $this->milesRadius = $milesRadius;
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
     * @return the $joinDate
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * @param field_type $joinDate
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
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
     * @return the $userRating
     */
    public function getUserRating()
    {
        return $this->userRating;
    }

    /**
     * @param field_type $userRating
     */
    public function setUserRating($userRating)
    {
        $this->userRating = $userRating;
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

    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        
        $image = $this->getProfileImage();
        
        if (trim($image) == '') {
            $image = '/img/avatar/no-avatar-male.gif';
        }
        
        $sex = strtolower($this->getSex());
        switch ($sex) {
            case 'm': $this->setSex('Male'); break;
            case 'f': $this->setSex('Female'); break;
            default: $this->setSex('Unknown');
        }
        
        $this->setProfileImage('http://www.londontennis.co.uk/' . $image);
    }

}
