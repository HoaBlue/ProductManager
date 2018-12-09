<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-03
 * Time: 11:42
 */

class pay_history
{
    var $item;
    var $quantity;
    var $date;

    /**
     * pay_history constructor.
     * @param $item
     * @param $quantity
     * @param $date
     */
    public function __construct($item, $quantity, $date)
    {
        $this->item = $item;
        $this->quantity = $quantity;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}