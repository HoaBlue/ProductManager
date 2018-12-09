<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-11-29
 * Time: 22:37
 */

class product
{
    var $ProductId;
    var $ProductName;
    var $Descriptions;
    var $SupplierId;
    var $CategoryId;
    var $TypeOfUnity;
    var $SuggestedPrice;
    var $Image;

    /**
     * product constructor.
     * @param $ProductId
     * @param $ProductName
     * @param $Descriptions
     * @param $SupplierId
     * @param $CategoryId
     * @param $TypeOfUnity
     * @param $SuggestedPrice
     * @param $Image
     */
    public function __construct($ProductId, $ProductName, $Descriptions, $SupplierId, $CategoryId, $TypeOfUnity, $SuggestedPrice, $Image)
    {
        $this->ProductId = $ProductId;
        $this->ProductName = $ProductName;
        $this->Descriptions = $Descriptions;
        $this->SupplierId = $SupplierId;
        $this->CategoryId = $CategoryId;
        $this->TypeOfUnity = $TypeOfUnity;
        $this->SuggestedPrice = $SuggestedPrice;
        $this->Image = $Image;
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
    public function getProductName()
    {
        return $this->ProductName;
    }

    /**
     * @param mixed $ProductName
     */
    public function setProductName($ProductName)
    {
        $this->ProductName = $ProductName;
    }

    /**
     * @return mixed
     */
    public function getDescriptions()
    {
        return $this->Descriptions;
    }

    /**
     * @param mixed $Descriptions
     */
    public function setDescriptions($Descriptions)
    {
        $this->Descriptions = $Descriptions;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->SupplierId;
    }

    /**
     * @param mixed $SupplierId
     */
    public function setSupplierId($SupplierId)
    {
        $this->SupplierId = $SupplierId;
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
    public function getTypeOfUnity()
    {
        return $this->TypeOfUnity;
    }

    /**
     * @param mixed $TypeOfUnity
     */
    public function setTypeOfUnity($TypeOfUnity)
    {
        $this->TypeOfUnity = $TypeOfUnity;
    }

    /**
     * @return mixed
     */
    public function getSuggestedPrice()
    {
        return $this->SuggestedPrice;
    }

    /**
     * @param mixed $SuggestedPrice
     */
    public function setSuggestedPrice($SuggestedPrice)
    {
        $this->SuggestedPrice = $SuggestedPrice;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    /**
     * @param mixed $Image
     */
    public function setImage($Image)
    {
        $this->Image = $Image;
    }


}