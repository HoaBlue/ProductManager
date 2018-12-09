<?php
include_once 'config/db.php';
include_once 'models/product.php';
include_once 'models/cart.php';
include_once 'models/user.php';
include_once 'models/product_review_num.php';
$db = Database::connect();
session_start();
$cart;

if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}else{
    $cart = new cart();
}
$user;
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Index</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="Content/bootstrap.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="Content/shop-homepage.css" rel="stylesheet" />
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">ĐIỆN MÁY ĐEN</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">TRANG CHỦ</a>
                </li>
                <li>
                    <a href="phone.php">ĐIỆN THOẠI</a>
                </li>
                <li>
                    <a href="tablet.php">MÁY TÍNH BẢNG</a>
                </li>
                <li>
                    <a href="laptop.php">LAPTOP</a>
                </li>
                <?php
//                    if(isset($user)){
//                        echo "<li>
//                                <a href='index.php'>{$user->getUserName()}</a>
//                            </li>";
//                        echo "<li>
//                                <a href='user_control.php?signout=true'>Đăng Xuất</a>
//                            </li>";
//                    }else{
//                        echo "<li>
//                                <a href='signup.php'>Đăng Ký</a>
//                            </li>";
//                        echo "<li>
//                                <a href='signin.php'>Đăng Nhập</a>
//                            </li>";
//                    }
                ?>
                <li>
                    <a href="cart.php" style="color: white; font-weight: bold; text-decoration: none;">
                        GIỎ HÀNG<?php echo "({$cart->getQuantity()})" ;?>
                    </a>

                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-2">

            <p class="lead">Nhà sản xuất</p>

            <div class="list-group">
                <?php
                include_once 'models/supplier.php';
                $sqlSupplier = "SELECT * FROM Supplier";

                $rsSupplier = $db->query($sqlSupplier);
                $listSupplier = array();

                while($row = $rsSupplier->fetch_assoc()){
                    //echo "{$row['SupplierId']} {$row['FullName']} {$row['TradeName']} {$row['Address']} {$row['Phone']} {$row['Email']} {$row['Fax']} ";
                    $tmp = new supplier($row['SupplierId'],$row['FullName'],$row['TradeName'],$row['Address'],$row['Phone'],$row['Email'],$row['Fax'],$row['Image']);
                    //echo "{$tmp->getTradeName()} address: {$tmp->getAddress()} ";
                    array_push($listSupplier, $tmp);
                }
                ?>
                <?php
                foreach ($listSupplier as $item) {
                    echo "
                             <a href='supplier.php?idSupplier={$item->getSupplierId()}' class='list-group-item'>
                                <img src='{$item->getImage()}' style='width: 30px; height: 30px'/> {$item->getTradeName()}
                            </a>
                        ";
                }
                ?>
            </div>

        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div id="custom-search-input">
                        <form action="search.php" method="get">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control input-lg" name="value" placeholder="Tìm kiếm" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px">

            </div>
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="images/broken-phone.png" alt="Los Angeles" style="width:100%;">
                            </div>

                            <div class="item">
                                <img src="images/iphone-banner.png" alt="Chicago" style="width:100%;">
                            </div>

                            <div class="item">
                                <img src="images/sale-banner.png" alt="New york" style="width:100%;">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
