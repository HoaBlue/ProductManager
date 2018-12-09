<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-09
 * Time: 15:12
 */

class admin
{
    var $AdminId;
    var $UserName;
    var $Password;
    var $Email;
    var $Phone;

    /**
     * admin constructor.
     * @param $AdminId
     * @param $UserName
     * @param $Password
     * @param $Email
     * @param $Phone
     */
    public function __construct($AdminId, $UserName, $Password, $Email, $Phone)
    {
        $this->AdminId = $AdminId;
        $this->UserName = $UserName;
        $this->Password = $Password;
        $this->Email = $Email;
        $this->Phone = $Phone;
    }

    /**
     * @return mixed
     */
    public function getAdminId()
    {
        return $this->AdminId;
    }

    /**
     * @param mixed $AdminId
     */
    public function setAdminId($AdminId)
    {
        $this->AdminId = $AdminId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->UserName;
    }

    /**
     * @param mixed $UserName
     */
    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param mixed $Phone
     */
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }



}