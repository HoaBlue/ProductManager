<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-01
 * Time: 20:18
 */
include_once 'models/cart.php';
include_once 'models/ItemCart.php';
include_once 'models/user.php';
include_once 'models/product.php';
include_once 'config/db.php';
session_start();
$cart;
$user;
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}else{
    $cart = new cart();
}
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['action'] == 'add'){
        $idProduct = $_GET['idProduct'];

        $db = Database::connect();
        $sqlDetail = "SELECT * FROM Product WHERE ProductId = {$idProduct} ";
        $rs = $db->query($sqlDetail);
        $productDetail;
        if($row = $rs->fetch_assoc()){
            $productDetail = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
        }
        $item = new ItemCart($productDetail,1);
        $cart->addItem($item);
        $_SESSION['cart'] = $cart;
        $db->close();
        header('Location:'.'cart.php');
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idProduct = $_POST['idProduct'];
    $quantity = $_POST['quantity'];

    if($_POST['detail']){
        header('Location:'.'product_detail.php?idProduct='.$idProduct);
    }else if($_POST['delete']){
        $cart->deleteItem($idProduct);
        $_SESSION['cart'] = $cart;
        header('Location:'.'cart.php');
    }else if($_POST['update']){
        $cart->updateItem($idProduct,$quantity);
        $_SESSION['cart'] = $cart;
        header('Location:'.'cart.php');
    }else if($_POST['pay']){
        if(!isset($user)){
            header('Location:'.'signin.php');
        }
        $db = Database::connect();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('Y-m-d H:i:s');
        foreach($cart->listItem as $i){
            $sqlPay = "INSERT INTO Bill (UserId, ProductId, Quantity, PayTime) VALUES ('{$user->getUserId()}', '{$i->product->getProductId()}', '{$i->getQuantity()}', '{$currentDateTime}')";
            //var_dump($sqlPay);
            $rs = $db->query($sqlPay);
//            if($row = $rs->fetch_assoc()){
//               echo "ok";
//            }
        }
        unset($_SESSION['cart']);
        $db->close();
        header('location:'.'pay_success.php');

    }else if($_POST['continue']){
        header('Location:'.'index.php');
    }
//    $_SESSION['cart'] = $cart;
//    header('Location:'.'cart.php');
}