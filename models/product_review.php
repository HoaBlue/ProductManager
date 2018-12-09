<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-04
 * Time: 11:46
 */
include_once 'product.php';
include_once 'review.php';

class product_review
{
    var $product;
    var $review;

    /**
     * product_review constructor.
     * @param $product
     * @param $review
     */
    public function __construct($product, $review)
    {
        $this->product = $product;
        $this->review = $review;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
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