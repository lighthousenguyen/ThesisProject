<?php

namespace VMN\Article;

use Illuminate\Database\Eloquent\Model;
use VMN\Contracts\Article\Article;

/**
 * @property string title
 * @property string description
 * @property string note
 * @property string usage
 * @property int ratingPoint
 * @property string utility
 * @property string thumbnailUrl
 * @property string author
 * @property string imgUrl
 * @property string id
 * @property string ingredients
 */

class Remedy extends Model implements Article
{
    public function id()
    {
        return $this->id;
    }

    public function setIngredient($ingredient)
    {
        $this->ingredients = $ingredient;
    }

    public function getIngredient()
    {
        return $this->ingredients;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param string $usage
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;
    }

    /**
     * @return int
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

    public function getProperties()
    {   
        return [
            'title',
            'description',
            'note',
            'usage',
            'utility',
            'thumbnailUrl',
            'author',
            'imgUrl',
            'ingredient'
        ];
    }
}