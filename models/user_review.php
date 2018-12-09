<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-04
 * Time: 12:19
 */
include_once 'user.php';
include_once 'review.php';
class user_review
{
    var $user;
    var $review;

    /**
     * user_review constructor.
     * @param $user
     * @param $review
     */
    public function __construct($user, $review)
    {
        $this->user = $user;
        $this->review = $review;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @param mixed $review
     */
    public function setReview($review)
    {
        $this->review = $review;
    }


}