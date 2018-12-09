<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-02
 * Time: 09:06
 */
include_once 'config/db.php';
include_once 'models/user.php';
$db = Database::connect();
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['signout'] != null){
        unset($_SESSION['user']);
        $db->close();
        header('Location:'.'index.php');
    }

}else if($_SERVER['REQUEST_METHOD'] = 'POST'){
    if($_POST['register'] != null){
        unset($_SESSION['signup_error']);
        $email;
        $password1;
        $password2;
        $username;

        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $username = $_POST['username'];

        //var_dump($email,$password1,$password2,$username);

        $hasError = false;
        $error = array();
        if(empty($username)){
            $hasError = true;
            array_push($error, 'Không được để trống HỌ VÀ TÊN');
        }
        if(empty($email)){
            $hasError = true;
            array_push($error,'Không được để trống EMAIL');
        }
        if(empty($password1) || empty($password2)  || $password1 != $password2){
            $hasError = true;
            array_push($error,'Mật khẩu và xác nhận mật khẩu không giống nhau');
        }

        if($hasError == true){
            $_SESSION['signup_error'] = $error;
            $db->close();
            header('Location:'.'signup.php');
        }else{
            $sqlSignup = "INSERT INTO User (UserId, Email, Password, UserName, Phone, Address) VALUES (NULL, '{$email}', '{$password1}', '{$username}', NULL, NULL)";
            $rs = $db->query($sqlSignup);

            $sqlGetinfo = "SELECT * FROM User WHERE User.Email = '{$email}' AND User.Password = '{$password1}'";
            $rs = $db -> query($sqlGetinfo);
            if($row = $rs->fetch_assoc()){
                //echo "Wtf";
                //var_dump($row['Email']);
                $session_user = new user($row['UserId'],$row['Email'],$row['Password'],$row['UserName'],$row['Phone'],$row['Address']);
                //var_dump($session_user);
                $_SESSION['user'] = $session_user;
                // var_dump($_SESSION['user']);
                $db->close();
                header('Location:'.'index.php');
            }
        }

    }
    if($_POST['signin'] != null){
        unset($_SESSION['signin_error']);
        $email;
        $password;

        $email = $_POST['email'];
        $password = $_POST['password'];

        $hasError = false;
        $error = array();

        if(empty($email)){
            $hasError = true;
            array_push($error, 'Không được để trống email');
        }
        if(empty($password)){
            $hasError = true;
            array_push($error, 'Không được để trống password');
        }

        if($hasError){
            $_SESSION['signin_error'] = $error;
            $db->close();
            header('Location:'.'signin.php');
        }else{
            $sqlGetinfo = "SELECT * FROM User WHERE User.Email = '{$email}' AND User.Password = '{$password}'";
            $rs = $db->query($sqlGetinfo);
            if($row = $rs->fetch_assoc()){
                $session_user = new user($row['UserId'],$row['Email'],$row['Password'],$row['UserName'],$row['Phone'],$row['Address']);
                $_SESSION['user'] = $session_user;
                $db->close();

            }else{
                $hasError = true;
                array_push($error,'Sai tên tài khoản, email, hoặc mật khẩu !');
            }
            if($hasError){
                $_SESSION['signin_error'] = $error;
                $db->close();
                header('Location:'.'signin.php');
            }else{
                header('Location:'.'index.php');
            }

            //

        }
    }
    if($_POST['update']){
        unset($_SESSION['user_update_error']);
        $username;
        $email;
        $phone;
        $address;

        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        //var_dump($username, $email, $phone, $address);
        $hasError = false;
        $error = array();
        if(empty($username)){
            $hasError = true;
            array_push($error, 'Họ và tên không được trống');
        }
        if(empty($email)){
            $hasError = true;
            array_push($error,'Email không được trống');
        }

        if($hasError == true){
            $_SESSION['user_update_error'] = $error;
            $db->close();
            header('location:'.'user_edit.php');
        }else{
            $current_user = $_SESSION['user'];
            $sqlUpdate = "UPDATE User SET Email = '{$email}', UserName = '{$username}', Phone = '{$phone}', Address = '{$address}' WHERE User.UserId = {$current_user->getUserId()}";
            $rs = $db->query($sqlUpdate);
            $sqlGetinfo = "SELECT * FROM User WHERE User.Email = '{$email}' AND User.Password = '{$current_user->getPassword()}'";
            var_dump($sqlGetinfo);
            $rs = $db->query($sqlGetinfo);

            if($row = $rs->fetch_assoc()){
                $current_user = new user($row['UserId'],$row['Email'],$row['Password'],$row['UserName'],$row['Phone'],$row['Address']);
                $_SESSION['user'] = $current_user;
                $db->close();
                header('location:'.'user_info.php');
            }

        }

    }

    if($_POST['public_comment'] != null){
        var_dump($_POST);
        $idProduct = $_POST['idProduct'];
        $idUser = $_POST['idUser'];
        $content = $_POST['comment'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('Y-m-d H:i:s');
        $sql_comment = "INSERT INTO Review (ReviewId, ProductId, UserId, Content, CommentDate) VALUES (NULL, '{$idProduct}', '{$idUser}', '{$content}', '{$currentDateTime}');";
        $rs = $db->query($sql_comment);
        $db->close();
        header('location:'.'product_detail.php?idProduct='.$idProduct);
    }
}