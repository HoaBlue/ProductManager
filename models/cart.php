<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-11-29
 * Time: 22:36
 */
include 'ItemCart.php';
class cart
{
    var $listItem;

    function  __construct()
    {
        $this->listItem = array();
    }

    function addItem($item){
        foreach ($this->listItem as $i){
            if($i->product->ProductId == $item->product->ProductId){
                $i->quantity++;
                return;
            }
        }
        $this->listItem[]=$item;
    }
    function addItemNormal($item){
        $this->listItem[] = $item;
    }
    function deleteItem($id){
        foreach ($this->listItem as $i){
            if($i->product->ProductId == $id){
                $index = array_search($i,$this->listItem);
                unset($this->listItem[$index]);
            }
        }
    }
    function updateItem($id,$quantity){
        if($quantity<=0){
            $this->DeleteItem($id);
        }
        foreach ($this->listItem as $i){
            if($i->product->ProductId == $id){
                $i->quantity = $quantity;
            }
        }
    }
    function getQuantity(){
        $quantity = 0;
        foreach ($this->listItem as $i){
            $quantity += $i->getQuantity();
        }
        return $quantity;
    }
}