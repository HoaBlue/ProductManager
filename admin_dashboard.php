<?php
    include_once 'models/admin.php';
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location:'.'admin_signin.php');
    }
    $admin = $_SESSION['admin'];
    //var_dump($admin)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Admin</title>
</head>
<body>

<div class="container">
    <div class="row" style="height: 10px">

    </div>
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="admin_dashboard.php" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="admin_view_user.php" class="list-group-item list-group-item-action">Quản lý người dùng</a>
                <a href="admin_view_product.php" class="list-group-item list-group-item-action">Quản lý sản phẩm</a>
                <a href="admin_view_supplier.php" class="list-group-item list-group-item-action">Quản lý nhà phân phối</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="admin_dashboard.php">Dashboard</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin_view_user.php"><?php echo "{$admin->getUserName()}" ?> <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin_signout.php">Đăng xuất <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row" style="height: 20px"></div>
            <div class="row" style=" margin-left: 1px; margin-right: 1px">
                <div class='col-sm-4 col-lg-4 col-md-4'>
                    <div class="row" style="width: 100%; margin: 0; padding: auto">
                        <div class="row" style="background-color: #f39c12; ">
                            <div class="col-md-3">
                                <img src="images/team.png" style="width: 50px; height: 50px">
                            </div>
                            <div class="col-md-9">
                                <h6 style="margin-top: 14px">Quản lý người dùng</h6>
                            </div>
                        </div>
                        <div class="row">
                            <a href="admin_view_user.php" style="color: #3c3c3c">
                                <p>
                                    - Xem danh sách người dùng.<br>
                                    - Thêm người dùng.<br>
                                    - Chỉnh sửa người dùng.<br>
                                    - Xóa người dùng.<br>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class='col-sm-4 col-lg-4 col-md-4'>
                    <div class="row" style="width: 100%; margin: 0; padding: auto">
                        <div class="row" style="background-color: #2ecc71; ">
                            <div class="col-md-3">
                                <img src="images/product.png" style="width: 50px; height: 50px">
                            </div>
                            <div class="col-md-9">
                                <h6 style="margin-top: 14px">Quản lý sản phẩm</h6>
                            </div>
                        </div>
                        <div class="row">
                            <a href="admin_view_product.php" style="color: #3c3c3c">
                                <p>
                                    - Xem danh sách sản phẩm.<br>
                                    - Thêm sản phẩm.<br>
                                    - Chỉnh sửa sản phẩm.<br>
                                    - Xóa sản phẩm.<br>
                                </p>
                            </a>
                        </div>
                    </div>
                </div><div class='col-sm-4 col-lg-4 col-md-4'>
                    <div class="row" style="width: 100%; margin: 0; padding: auto">
                        <div class="row" style="background-color: #3498db; ">
                            <div class="col-md-3">
                                <img src="images/factory.png" style="width: 50px; height: 50px">
                            </div>
                            <div class="col-md-9">
                                <h6 style="margin-top: 14px">Quản lý nhà phân phối</h6>
                            </div>
                        </div>
                        <div class="row">
                            <a href="admin_view_supplier.php" style="color: #3c3c3c">
                                <p>
                                    - Xem danh sách nhà phân phối.<br>
                                    - Thêm nhà phân phối.<br>
                                    - Chỉnh sửa nhà phân phối.<br>
                                    - Xóa nhà phân phối.<br>
                                </p>
                            </a>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
</body>
</html>
