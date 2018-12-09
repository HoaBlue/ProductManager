<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-02
 * Time: 09:03
 */

class user
{
    var $userId;
    var $email;
    var $password;
    var $userName;
    var $phone;
    var $address;

    /**
     * user constructor.
     * @param $userId
     * @param $email
     * @param $password
     * @param $userName
     * @param $phone
     * @param $address
     */
    public function __construct($userId, $email, $password, $userName, $phone, $address)
    {
        $this->userId = $userId;
        $this->email = $email;
        $this->password = $password;
        $this->userName = $userName;
        $this->phone = $phone;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
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


}