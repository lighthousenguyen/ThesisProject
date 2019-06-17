<?php

namespace VMN\Article;

use Illuminate\Database\Eloquent\Model;
use VMN\Contracts\Article\Article;

/**
 * @property string commonName
 * @property string otherName
 * @property string scienceName
 * @property string location
 * @property string characteristic
 * @property int ratingPoint
 * @property string utility
 * @property string thumbnailUrl
 * @property string author
 * @property string imgUrl
 * @property string id
 */
class MedicinalPlant extends Model implements Article
{
    public function id()
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * @param string $commonName
     */
    public function setCommonName($commonName)
    {
        $this->commonName = $commonName;
    }

    /**
     * @return string
     */
    public function getOtherName()
    {
        return $this->otherName;
    }

    /**
     * @param string $otherName
     */
    public function setOtherName($otherName)
    {
        $this->otherName = $otherName;
    }

    /**
     * @return string
     */
    public function getScienceName()
    {
        return $this->scienceName;
    }

    /**
     * @param string $scienceName
     */
    public function setScienceName($scienceName)
    {
        $this->scienceName = $scienceName;
    }

    /**
     * @return string
     */
    public function getCharacteristic()
    {
        return $this->characteristic;
    }

    /**
     * @param string $characteristic
     */
    public function setCharacteristic($characteristic)
    {
        $this->characteristic = $characteristic;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getUtility()
    {
        return $this->utility;
    }

    /**
     * @param string $utility
     */
    public function setUtility($utility)
    {
        $this->utility = $utility;
    }

    /**
     * @return string
     */
    public function getRatingPoint()
    {
        return $this->ratingPoint;
    }

    /**
     * @param int $ratingPoint
     */
    public function setRatingPoint($ratingPoint)
    {
        $this->ratingPoint = $ratingPoint;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string $thumbnailUrl
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
    }

    /**
     * @return string
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param string $imgUrl
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return [
            'commonName',
            'otherName',
            'scienceName',
            'characteristic',
            'location',
            'utility',
            'author',
            'thumbnailUrl',
            'imgUrl',
        ];
    }
}
