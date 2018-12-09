<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-01
 * Time: 17:37
 */

class supplier
{
    var $supplierId;
    var $fullName;
    var $tradeName;
    var $address;
    var $phone;
    var $email;
    var $fax;
    var $image;

    /**
     * supplier constructor.
     * @param $supplierId
     * @param $fullName
     * @param $tradeName
     * @param $address
     * @param $phone
     * @param $email
     * @param $fax
     * @param $image
     */
    public function __construct($supplierId, $fullName, $tradeName, $address, $phone, $email, $fax, $image)
    {
        $this->supplierId = $supplierId;
        $this->fullName = $fullName;
        $this->tradeName = $tradeName;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->fax = $fax;
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getSupplierId()
    {
        return $this->supplierId;
    }

    /**
     * @param mixed $supplierId
     */
    public function setSupplierId($supplierId)
    {
        $this->supplierId = $supplierId;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getTradeName()
    {
        return $this->tradeName;
    }

    /**
     * @param mixed $tradeName
     */
    public function setTradeName($tradeName)
    {
        $this->tradeName = $tradeName;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }



}