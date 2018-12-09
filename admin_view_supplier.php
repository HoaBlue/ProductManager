<?php
include_once 'models/admin.php';
session_start();
if(!isset($_SESSION['admin'])){
    header('location:'.'admin_signin.php');
}
$admin = $_SESSION['admin'];
?>
<?php
include_once 'config/db.php';
include_once 'models/product.php';
include_once 'models/supplier.php';
include_once 'models/category.php';

$db = Database::connect();

$searchValue = -1;
$isAddSupplier = false;
$update_supplier;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['idSupplier'] != null AND !empty($_GET['idSupplier'])){
        $sql_update = "SELECT * FROM Supplier WHERE Supplier.SupplierId = '{$_GET['idSupplier']}'";
        $rs = $db->query($sql_update);
        if($row = $rs->fetch_assoc()){
            $update_supplier = new supplier($row['SupplierId'],$row['FullName'],$row['Tradename'],$row['Address'],$row['Phone'],$row['Email'],$row['Fax'],$row['Image']);
        }
    }
    if($_GET['addsupplier'] != null){
        $isAddSupplier = true;
    }
}else if($_SERVER['REQUEST_METHOD'] = 'POST'){
    if($_POST['searchValue'] != null){
        $searchValue = $_POST['searchValue'];
    }
}


$sqlSupplier = "SELECT * FROM Supplier WHERE (Supplier.TradeName LIKE '%{$searchValue}%%' OR Supplier.FullName LIKE '%{$searchValue}%' OR '{$searchValue}' = -1)";
$listSupplier = array();

$rs = $db->query($sqlSupplier);
while($row = $rs->fetch_assoc()){
    $tmp = new supplier($row['SupplierId'],$row['FullName'],$row['Tradename'],$row['Address'],$row['Phone'],$row['Email'],$row['Fax'],$row['Image']);
    array_push($listSupplier,$tmp);
}




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
                <a href="admin_dashboard.php" class="list-group-item list-group-item-action ">Dashboard</a>
                <a href="admin_view_user.php" class="list-group-item list-group-item-action">Quản lý người dùng</a>
                <a href="admin_view_product.php" class="list-group-item list-group-item-action">Quản lý sản phẩm</a>
                <a href="admin_view_supplier.php" class="list-group-item list-group-item-action  active">Quản lý nhà phân phối</a>


            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="admin_view_supplier.php">Quản lý nhà sản xuất</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin_view_supplier.php?addsupplier=true">Thêm nhà sản xuất <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-md-0" action="admin_view_supplier.php" method="post">
                                <input class="form-control" type="text" placeholder="Tìm kiếm" aria-label="Search" name="searchValue">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="card">
                <?php
                    if($isAddSupplier == true){
                        echo"
                            <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4>Thêm nhà sản xuất</h4>
                            <hr>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <form action='admin_control.php' method='post' id='update-form'>
                                <div class='form-group row'>
                                    <label for='username' class='col-4 col-form-label'>Tên đầy đủ nhà sản xuất: </label>
                                    <div class='col-8'>
                                        <input id='username' name='FullName' placeholder='Tên nhà sản xuất' class='form-control here' type='text' required='required'>
                                    </div>
                                </div>";
                        echo "
                                <div class='form-group row'>
                                    <label for='name' class='col-4 col-form-label'>Tên nhà sản xuất: </label>
                                    <div class='col-8'>
                                       <input id='username' name='TradeName' placeholder='Tên nhà sản xuất' class='form-control here' type='text'>
                                    </div>
                                </div>";
                        echo "
                                <div class='form-group row'>
                                    <label for='lastname' class='col-4 col-form-label'>Địa chỉ: </label>
                                    <div class='col-8'>
                                        <input id='username' name='Address' placeholder='Địa chỉ' class='form-control here' type='text' >
                                    </div>
                                </div>
                                ";
                        echo "
                                <div class='form-group row'>
                                    <label for='text' class='col-4 col-form-label'>Số điện thoại: </label>
                                    <div class='col-8'>
                                        <input id='text' name='Phone' placeholder='Số điện thoại' class='form-control here' type='number'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Email:</label>
                                    <div class='col-8'>
                                        <input id='text' name='Email' placeholder='Email' class='form-control here' type='text'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class='col-4 col-form-label'>Fax</label>
                                    <div class=col-8>
                                        <input id='email' name='Fax' class='form-control here' type='text'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class='col-4 col-form-label'>Hình ảnh:</label>
                                    <div class=col-8>
                                        <input id='email' name='Image' class='form-control here' type='file'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <div class='offset-4 col-8'>
                                        <button name='add_supplier' type='submit' value=' ' class='btn btn-primary'>Thêm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                        ";
                    }
                ?>
                <?php
                if(isset($update_supplier)){
                    echo"
                            <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4>Cập nhật nhà sản xuất</h4>
                            <hr>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <form action='admin_control.php' method='post' id='update-form'>
                                <div class='form-group row'>
                                    <label for='username' class='col-4 col-form-label'>Tên đầy đủ nhà sản xuất: </label>
                                    <div class='col-8'>
                                        <input id='username' name='FullName' placeholder='Tên nhà sản xuất' class='form-control here' type='text' required='required' value='{$update_supplier->getFullName()}'>
                                    </div>
                                </div>";
                    echo "
                                <div class='form-group row'>
                                    <label for='name' class='col-4 col-form-label'>Tên nhà sản xuất: </label>
                                    <div class='col-8'>
                                       <input id='username' name='TradeName' placeholder='Tên nhà sản xuất' class='form-control here' type='text' value='{$update_supplier->getTradeName()}'>
                                    </div>
                                </div>";
                    echo "
                                <div class='form-group row'>
                                    <label for='lastname' class='col-4 col-form-label'>Địa chỉ: </label>
                                    <div class='col-8'>
                                        <input id='username' name='Address' placeholder='Địa chỉ' class='form-control here' type='text' value='{$update_supplier->getAddress()}'>
                                    </div>
                                </div>
                                ";
                    echo "
                                <div class='form-group row'>
                                    <label for='text' class='col-4 col-form-label'>Số điện thoại: </label>
                                    <div class='col-8'>
                                        <input id='text' name='Phone' placeholder='Số điện thoại' class='form-control here' type='number' value='{$update_supplier->getPhone()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Email:</label>
                                    <div class='col-8'>
                                        <input id='text' name='Email' placeholder='Email' class='form-control here' type='text' value='{$update_supplier->getEmail()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class='col-4 col-form-label'>Fax</label>
                                    <div class=col-8>
                                        <input id='email' name='Fax' class='form-control here' type='text' value='{$update_supplier->getFax()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class='col-4 col-form-label'>Hình ảnh:</label>
                                    <div class=col-8>
                                        <input id='email' name='Image' class='form-control here' type='file' value='{$update_supplier->getImage()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <div class='offset-4 col-8'>
                                        <input type='hidden' name='SupplierId' value='{$update_supplier->getSupplierId()}'>
                                        <button name='update_supplier' type='submit' value=' ' class='btn btn-primary'>Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                        ";
                }
                ?>
                <!-- main view -->
                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 50px"></th>
                                <th scope="col">Tên nhà sản xuất</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col" style="width: 50px"></th>
                                <th scope="col" style="width: 50px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listSupplier as $i){
                                echo "<tr>";
                                echo "
                                        <th scope='row'><img src='{$i->getImage()}' alt='{$i->getTradeName()}' style='width: 40px;height: 40px;'></th>
                                        <td>{$i->getFullName()}</td>
                                        <td>{$i->getAddress()}</td>
                                        <td>
                                        <form action='admin_control.php' method='get'>
                                        <input type='hidden' name='idSupplier' value='{$i->getSupplierId()}'>
                                        <input type='submit' name='update_supplier' value='Thay đổi'>
                                        </form>
                                        </td>
                                        <td>
                                        <form action='admin_control.php' method='post'>
                                        <input type='hidden' name='idSupplier' value='{$i->getSupplierId()}'>
                                        <input type='submit' name='delete_supplier' value='Xóa'>
                                        </form>
                                        </td>
                                        ";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
