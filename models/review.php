<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-04
 * Time: 11:45
 */

class review
{
    var $ReviewId;
    var $ProductId;
    var $UserId;
    var $Content;
    var $CommentDate;

    /**
     * review constructor.
     * @param $ReviewId
     * @param $ProductId
     * @param $UserId
     * @param $Content
     * @param $CommentDate
     */
    public function __construct($ReviewId, $ProductId, $UserId, $Content, $CommentDate)
    {
        $this->ReviewId = $ReviewId;
        $this->ProductId = $ProductId;
        $this->UserId = $UserId;
        $this->Content = $Content;
        $this->CommentDate = $CommentDate;
    }

    /**
     * @return mixed
     */
    public function getReviewId()
    {
        return $this->ReviewId;
    }

    /**
     * @param mixed $ReviewId
     */
    public function setReviewId($ReviewId)
    {
        $this->ReviewId = $ReviewId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->ProductId;
    }

    /**
     * @param mixed $ProductId
     */
    public function setProductId($ProductId)
    {
        $this->ProductId = $ProductId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * @param mixed $UserId
     */
    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @param mixed $Content
     */
    public function setContent($Content)
    {
        $this->Content = $Content;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->CommentDate;
    }

    /**
     * @param mixed $CommentDate
     */
    public function setCommentDate($CommentDate)
    {
        $this->CommentDate = $CommentDate;
    }



}