<?php

namespace VMN\ArticleReviewService;

class Review
{

    protected $comment;

    protected $rating;

    protected $reviewer;

    protected $reviewed;

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @return mixed
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }

    /**
     * @return mixed
     */
    public function getReviewed()
    {
        return $this->reviewed;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @param mixed $reviewer
     */
    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
    }

    /**
     * @param mixed $reviewed
     */
    public function setReviewed($reviewed)
    {
        $this->reviewed = $reviewed;
    }


    /**
     * @return Rating
     */
    public function rating()
    {

    }

    /**
     * @return Comment
     */
    public function comment()
    {

    }
}