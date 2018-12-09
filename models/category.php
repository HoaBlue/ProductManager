<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-02
 * Time: 19:53
 */

class category
{
    var $CategoryId;
    var $CategoryName;
    var $ParentCategoryId;
    var $SortOrder;

    /**
     * category constructor.
     * @param $CategoryId
     * @param $CategoryName
     * @param $ParentCategoryId
     * @param $SortOrder
     */
    public function __construct($CategoryId, $CategoryName, $ParentCategoryId, $SortOrder)
    {
        $this->CategoryId = $CategoryId;
        $this->CategoryName = $CategoryName;
        $this->ParentCategoryId = $ParentCategoryId;
        $this->SortOrder = $SortOrder;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->CategoryId;
    }

    /**
     * @param mixed $CategoryId
     */
    public function setCategoryId($CategoryId)
    {
        $this->CategoryId = $CategoryId;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    /**
     * @param mixed $CategoryName
     */
    public function setCategoryName($CategoryName)
    {
        $this->CategoryName = $CategoryName;
    }

    /**
     * @return mixed
     */
    public function getParentCategoryId()
    {
        return $this->ParentCategoryId;
    }

    /**
     * @param mixed $ParentCategoryId
     */
    public function setParentCategoryId($ParentCategoryId)
    {
        $this->ParentCategoryId = $ParentCategoryId;
    }

    /**
     * @return mixed
     */
    public function getSortOrder()
    {
        return $this->SortOrder;
    }

    /**
     * @param mixed $SortOrder
     */
    public function setSortOrder($SortOrder)
    {
        $this->SortOrder = $SortOrder;
    }


}