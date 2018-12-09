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
$isAddProduct = false;

if($_SERVER['REQUEST_METHOD'] = 'POST'){
    if($_POST['searchValue'] != null){
        $searchValue = $_POST['searchValue'];
    }
}


$sqlProduct = "SELECT * FROM Product WHERE (Product.ProductName LIKE '%{$searchValue}%' OR '{$searchValue}' = -1)";
$listProduct = array();

$rs = $db->query($sqlProduct);
while($row = $rs->fetch_assoc()){
    $tmp = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnity'],$row['SuggestedPrice'],$row['Image']);
    array_push($listProduct,$tmp);
}


$listSupplier;
$listCategory;
$update_product;
$update_product_supplier_name;
$update_product_category_name;
if($_SERVER['REQUEST_METHOD'] = 'GET'){
    if($_GET['idProduct'] != null AND !empty($_GET['idProduct'])){
        $sql_update_product = "SELECT Product.*, ProductCategory.CategoryName, Supplier.TradeName FROM Product JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId JOIN Supplier ON Product.SupplierId = Supplier.SupplierId WHERE Product.ProductId = {$_GET['idProduct']}";
        $rs = $db->query($sql_update_product);
        if($row = $rs->fetch_assoc()){
            $update_product = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
            $update_product_supplier_name = $row['TradeName'];
            $update_product_category_name = $row['CategoryName'];
        }
    }
    if($_GET['addproduct'] != null){
        $isAddProduct = true;
    }
}
if(isset($update_product) OR $isAddProduct){
    $sqlSupplier = "SELECT * FROM Supplier";
    $sqlCategory = "SELECT * FROM ProductCategory";

    $listSupplier = array();
    $listCategory = array();

    $rs = $db->query($sqlSupplier);
    while($row = $rs->fetch_assoc()){
        $tmp = new supplier($row['SupplierId'],$row['FullName'],$row['TradeName'],$row['Address'],$row['Phone'],$row['Email'],$row['Fax'], $row['Image']);
        array_push($listSupplier,$tmp);
    }

    $rs = $db->query($sqlCategory);
    while($row = $rs->fetch_assoc()){
        $tmp = new category($row['CategoryId'],$row['CategoryName'],$row['ParentCategoryId'],$row['SortOrder']);
        array_push($listCategory,$tmp);
    }
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
                <a href="admin_view_product.php" class="list-group-item list-group-item-action active">Quản lý sản phẩm</a>
                <a href="admin_view_supplier.php" class="list-group-item list-group-item-action">Quản lý nhà phân phối</a>


            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="admin_view_product.php">Quản lý sản phẩm</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin_view_product.php?addproduct=true">Thêm sản phẩm <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-md-0" action="admin_view_product.php" method="post">
                                <input class="form-control" type="text" placeholder="Tìm kiếm" aria-label="Search" name="searchValue">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="card">
                <?php
                    if($isAddProduct == true){
                        echo"
                            <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4>Thêm sản phẩm</h4>
                            <hr>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <form action='admin_control.php' method='post' id='update-form'>
                                <div class='form-group row'>
                                    <label for='username' class='col-4 col-form-label'>Tên sản phẩm: </label>
                                    <div class='col-8'>
                                        <input id='username' name='ProductName' placeholder='Tên sản phẩm' class='form-control here' type='text' required=>
                                    </div>
                                </div>";
                        echo "
                                <div class='form-group row'>
                                    <label for='name' class='col-4 col-form-label'>Hãng sản xuất: </label>
                                    <div class='col-8'>
                                        <select id='select' name='SupplierId' class='custom-select'>";
                        foreach ($listSupplier as $i){
                            echo "<option value='{$i->getSupplierId()}'>{$i->getTradeName()}</option>";
                        }
                        echo"                </select>
                                    </div>
                                </div>";
                        echo "
                                <div class='form-group row'>
                                    <label for='lastname' class='col-4 col-form-label'>Loại hàng: </label>
                                    <div class='col-8'>
                                        <select id='select' name='CategoryId' class='custom-select'>";
                        foreach ($listCategory as $i){
                            echo "<option value='{$i->getCategoryId()}'>{$i->getCategoryName()}</option>";
                        }
                        echo "
                                        </select>
                                    </div>
                                </div>
                                ";
                        echo "
                                <div class='form-group row'>
                                    <label for='text' class='col-4 col-form-label'>Đơn vị tính: </label>
                                    <div class='col-8'>
                                        <input id='text' name='TypeOfUnit' placeholder='Đơn vị tính' class='form-control here' type='text' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Giá tiền:</label>
                                    <div class='col-8'>
                                        <input id='text' name='SuggestedPrice' placeholder='Giá tiền' class='form-control here' required='required' type='number' min='1' required>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class=\"col-4 col-form-label\">Hình ảnh:</label>
                                    <div class=col-8>
                                        <input id='email' name='Image' class='form-control here' type='file' >
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='publicinfo' class='col-4 col-form-label'>Mô tả:</label>
                                    <div class='col-8'>
                                        <textarea id='publicinfo' name='Descriptions' cols='40' rows='4' class='form-control' form='update-form'></textarea>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <div class='offset-4 col-8'>
                                        <button name='add_product' type='submit' value=' ' class='btn btn-primary'>Thêm</button>
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
                    if(isset($update_product)){
                        echo"
                            <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4>Cập nhật sản phẩm</h4>
                            <hr>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <form action='admin_control.php' method='post' id='update-form'>
                                <div class='form-group row'>
                                    <label for='username' class='col-4 col-form-label'>Tên sản phẩm: </label>
                                    <div class='col-8'>
                                        <input id='username' name='ProductName' placeholder='Tên Điện thoại' class='form-control here' type='text' value='{$update_product->getProductName()}'>
                                    </div>
                                </div>";
                        echo "
                                <div class='form-group row'>
                                    <label for='name' class='col-4 col-form-label'>Hãng sản xuất: </label>
                                    <div class='col-8'>
                                        <select id='select' name='SupplierId' class='custom-select'>
                                            <option selected value='{$update_product->getSupplierId()}'>{$update_product_supplier_name}</option>";
                                foreach ($listSupplier as $i){
                                    echo "<option value='{$i->getSupplierId()}'>{$i->getTradeName()}</option>";
                                }
                        echo"                </select>
                                    </div>
                                </div>";
                        echo "
                                <div class='form-group row'>
                                    <label for='lastname' class='col-4 col-form-label'>Loại hàng: </label>
                                    <div class='col-8'>
                                        <select id='select' name='CategoryId' class='custom-select'>
                                            <option selected value='{$update_product->getCategoryId()}'>{$update_product_category_name}</option>";
                                foreach ($listCategory as $i){
                                    echo "<option value='{$i->getCategoryId()}'>{$i->getCategoryName()}</option>";
                                }
                        echo "
                                        </select>
                                    </div>
                                </div>
                                ";
                        echo "
                                <div class='form-group row'>
                                    <label for='text' class='col-4 col-form-label'>Đơn vị tính: </label>
                                    <div class='col-8'>
                                        <input id='text' name='TypeOfUnit' placeholder='Đơn vị tính' class='form-control here' type='text' value='{$update_product->getTypeOfUnity()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Giá tiền</label>
                                    <div class='col-8'>
                                        <input id='text' name='SuggestedPrice' placeholder='Giá tiền' class='form-control here' required='required' type='number' min='1' value='{$update_product->getSuggestedPrice()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class=\"col-4 col-form-label\">Hình ảnh</label>
                                    <div class=col-8>
                                        <input id='email' name='Image' class='form-control here' type='file' value='{$update_product->getImage()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='email' class=\"col-4 col-form-label\">Hình ảnh chi tiết:</label>
                                    <div class=col-8>
                                        <input id='email' name='ImageDescription' class='form-control here' type='file' >
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='publicinfo' class='col-4 col-form-label'>Mô tả</label>
                                    <div class='col-8'>
                                        <textarea id='publicinfo' name='Descriptions' cols='40' rows='4' class='form-control' form='update-form'>{$update_product->getDescriptions()}</textarea>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <div class='offset-4 col-8'>
                                        <input type='hidden' name='ProductId' value='{$update_product->getProductId()}'>
                                        <button name='update_product' type='submit' value=' ' class='btn btn-primary'>Cập nhật</button>
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
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col" style="width: 50px"></th>
                                <th scope="col" style="width: 50px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($listProduct as $i){
                                    echo "<tr>";
                                    echo "
                                        <th scope='row'><img src='{$i->getImage()}' alt='{$i->getProductName()}' style='width: 40px;height: 40px;'></th>
                                        <td><img src=''>{$i->getProductName()}</td>
                                        <td>{$i->getSuggestedPrice()}</td>
                                        <td>
                                        <form action='admin_control.php' method='get'>
                                        <input type='hidden' name='idProduct' value='{$i->getProductId()}'>
                                        <input type='submit' name='update_product' value='Thay đổi'>
                                        </form>
                                        </td>
                                        <td>
                                        <form action='admin_control.php' method='post'>
                                        <input type='hidden' name='idProduct' value='{$i->getProductId()}'>
                                        <input type='submit' name='delete_product' value='Xóa'>
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
