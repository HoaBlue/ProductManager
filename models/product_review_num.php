<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-04
 * Time: 11:49
 */
include_once 'product.php';
class product_review_num
{
    var $product;
    var $review_num;

    /**
     * product_review_num constructor.
     * @param $product
     * @param $review_num
     */
    public function __construct($product, $review_num)
    {
        $this->product = $product;
        $this->review_num = $review_num;
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
    public function getReviewNum()
    {
        return $this->review_num;
    }

    /**
     * @param mixed $review_num
     */
    public function setReviewNum($review_num)
    {
        $this->review_num = $review_num;
    }



}