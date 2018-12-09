<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-02
 * Time: 18:41
 */

include_once 'config/db.php';
include_once 'models/product.php';
include_once 'models/supplier.php';
include_once 'models/category.php';
include_once 'models/admin.php';

$db = Database::connect();
session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['update_product'] != null){
        $idProduct = $_GET['idProduct'];
        $db->close();
        header('location:'.'admin_view_product.php?idProduct='.$idProduct);
        echo "thay doi {$idProduct}";
    }else if($_GET['update_supplier']){
        $idSupplier = $_GET['idSupplier'];
        $db->close();
        header('location:'.'admin_view_supplier.php?idSupplier='.$idSupplier);
    }else if($_GET['update_user']){
        $idUser = $_GET['idUser'];
        $db->close();
        //var_dump(($_GET));
        header('location:'.'admin_view_user.php?idUser='.$idUser);
    }else {
        $db->close();
        if(isset($_SESSION['admin'])){
            header('location:' . 'admin_dashboard.php');
        }else{
            header('location:'.'admin_signin.php');
        }
    }
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['update_product'] != null){
        $productId;
        $productName;
        $descriptions;
        $supplierId;
        $categoryId;
        $typeOfUnit;
        $suggestedPrice;
        $image;

        $productId = $_POST['ProductId'];
        $productName = $_POST['ProductName'];
        $descriptions = $_POST['Descriptions'];
        $supplierId = $_POST['SupplierId'];
        $categoryId = $_POST['CategoryId'];
        $typeOfUnit = $_POST['TypeOfUnit'];
        $suggestedPrice = $_POST['SuggestedPrice'];
        $image = $_POST['Image'];
        $imageDescription = $_POST['ImageDescription'];
        if(!empty($image)) {
            $image = "images/Product/".$_POST['Image'];
            $sql_image = "UPDATE Product SET ProductName = '{$productName}', Descriptions = '{$descriptions}', SupplierId = '{$supplierId}', CategoryId = '{$categoryId}', TypeOfUnit = '{$typeOfUnit}', SuggestedPrice = '{$suggestedPrice}', Image = '{$image}' WHERE Product.ProductId = {$productId}";
            $rs = $db->query($sql_image);
        }else{
            $sql_no_image = "UPDATE Product SET ProductName = '{$productName}', Descriptions = '{$descriptions}', SupplierId = '{$supplierId}', CategoryId = '{$categoryId}', TypeOfUnit = '{$typeOfUnit}', SuggestedPrice = '{$suggestedPrice}' WHERE Product.ProductId = {$productId}";
            $rs = $db->query($sql_no_image);
        }
        if(!empty($imageDescription)){
            $imageDescription = "Hinhsanpham/".$_POST['ImageDescription'];
            $sql_image = "INSERT INTO ProductPhoto (PhotoId, ProductId, FileName, DisplayOrder) VALUES (NULL, '{$productId}', '{$imageDescription}', '1')";
            $rs = $db->query($sql_image);
        }
        $db->close();
        header('location:' . 'admin_view_product.php');
    }
    if($_POST['add_product'] != null){
        $productName;
        $descriptions;
        $supplierId;
        $categoryId;
        $typeOfUnit;
        $suggestedPrice;
        $image;

        $productName = $_POST['ProductName'];
        $descriptions = $_POST['Descriptions'];
        $supplierId = $_POST['SupplierId'];
        $categoryId = $_POST['CategoryId'];
        $typeOfUnit = $_POST['TypeOfUnit'];
        $suggestedPrice = $_POST['SuggestedPrice'];
        $image = "images/Product/".$_POST['Image'];
        //var_dump($image);
        $sql_insert = "INSERT INTO Product (ProductId, ProductName, Descriptions, SupplierId, CategoryId, TypeOfUnit, SuggestedPrice, Image) VALUES (NULL, '{$productName}', '{$descriptions}', '{$supplierId}', '{$categoryId}', '{$typeOfUnit}', '{$suggestedPrice}', '{$image}')";
        $rs = $db->query($sql_insert);
        $db->close();
        header('location:' . 'admin_view_product.php');
    }
    if($_POST['delete_product'] != null){
        $ProductId = $_POST['idProduct'];
        $sql_delete = "DELETE FROM Product WHERE Product.ProductId = {$ProductId}";
        $rs = $db->query($sql_delete);
        $db->close();
        var_dump($sql_delete);
        header('location:' . 'admin_view_product.php');
    }
    if($_POST['update_supplier'] != null){
        $SupplierId;
        $FullName;
        $TradeName;
        $Address;
        $Phone;
        $Email;
        $Fax;
        $Image;

        $SupplierId = $_POST['SupplierId'];
        $FullName = $_POST['FullName'];
        $TradeName = $_POST['TradeName'];
        $Address = $_POST['Address'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        $Fax = $_POST['Fax'];
        $Image = $_POST['Image'];

        if(!empty($Image)) {
            $Image = "images/Supplier/".$_POST['Image'];
            $sql_image = "UPDATE Supplier SET FullName = '{$FullName}', TradeName = '{$TradeName}', Address = '{$Address}', Phone = '{$Phone}', Email = '{$Email}', Fax = '{$Fax}', Image = '{$Image}' WHERE Supplier.SupplierId = {$SupplierId}";
            var_dump($sql_image);
            $rs = $db->query($sql_image);
        }else{
            $sql_no_image = "UPDATE Supplier SET FullName = '{$FullName}', TradeName = '{$TradeName}', Address = '{$Address}', Phone = '{$Phone}', Email = '{$Email}', Fax = '{$Fax}' WHERE Supplier.SupplierId = {$SupplierId}";
            var_dump($sql_no_image);
            $rs=$db->query($sql_no_image);
        }
        $db->close();
        header('location:' . 'admin_view_supplier.php');
    }
    if($_POST['add_supplier'] != null){
        $FullName;
        $TradeName;
        $Address;
        $Phone;
        $Email;
        $Fax;
        $Image;

        $FullName = $_POST['FullName'];
        $TradeName = $_POST['TradeName'];
        $Address = $_POST['Address'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];
        $Fax = $_POST['Fax'];
        $Image = "images/Supplier/".$_POST['Image'];

        $sql_insert = "INSERT INTO Supplier (SupplierId, FullName, TradeName, Address, Phone, Email, Fax, Image) VALUES (NULL, '{$FullName}', '{$TradeName}', '{$Address}', '{$Phone}', '{$Email}', '{$Fax}', '{$Image}')";
        $rs = $db->query($sql_insert);
        $db->close();
        header('location:' . 'admin_view_supplier.php');
    }
    if($_POST['delete_supplier'] != null){
        $SupplierId = $_POST['idSupplier'];
        $sql_delete = "DELETE FROM Supplier WHERE Supplier.SupplierId = {$SupplierId}";
        $rs = $db->query($sql_delete);
        $db->close();
        var_dump($sql_delete);
        header('location:' . 'admin_view_supplier.php');
    }

    if($_POST['update_user'] != null){
        $UserId = $_POST['UserId'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $UserName = $_POST['UserName'];
        $Phone = $_POST['Phone'];
        $Address = $_POST['Address'];

        $sql_update = "UPDATE User SET Email = '{$Email}', Password = '{$Password}', UserName = '{$UserName}', Phone = '{$Phone}', Address = '{$Address}' WHERE User.UserId = {$UserId}";
        $rs = $db->query($sql_update);
        $db->close();
        header('location:'.'admin_view_user.php');
    }
    if($_POST['add_user']){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $UserName = $_POST['UserName'];
        $Phone = $_POST['Phone'];
        $Address = $_POST['Address'];
        $Manager = $_POST['Manager'];

        $sql_insert = "INSERT INTO User (UserId, Email, Password, UserName, Phone, Address) VALUES (NULL, '{$Email}', '{$Password}', '{$UserName}', '{$Phone}', '{$Address}')";
        if(!empty($Manager)){
            $sql_insert = "INSERT INTO `Admin` (`AdminID`, `UserName`, `Password`, `Email`, `Phone`) VALUES (NULL, '{$UserName}', '{$Password}', '{$Email}', '{$Phone}')";
        }
        $rs = $db->query($sql_insert);
        $db->close();
        header('location:'.'admin_view_user.php');

    }
    if($_POST['delete_user']){
        $UserId = $_POST['idUser'];

        $sql_delete = "DELETE FROM User WHERE User.UserId = '{$UserId}'";
        $rs = $db->query($sql_delete);
        $db->close();
        header('location:'.'admin_view_user.php');
    }

    if($_POST['admin_signin']){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];

        $sql_admin_check = "SELECT * FROM Admin WHERE Admin.Email = '{$email}' AND Admin.Password = '{$password}'";
        $rs = $db->query($sql_admin_check);

        if($row = $rs->fetch_assoc()){
            $admin = new admin($row['AdminId'],$row['UserName'],$row['Password'],$row['Email'],$row['Phone']);
            $_SESSION['admin'] = $admin;
            $db->close();
            header('location:admin_dashboard.php');
        }
        else{
            $db->close();
            $_SESSION['error_admin'] = "Sai tên tài khoản hoặc sai mật khẩu";
            header('location:'.'admin_signin.php?error=true');
        }

    }
}