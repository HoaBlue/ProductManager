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
include_once 'models/user.php';
include_once 'models/supplier.php';
include_once 'models/category.php';

$db = Database::connect();

$searchValue = -1;
$isAddUser = false;
$update_user;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if($_GET['idUser'] != null AND !empty($_GET['idUser'])){
        $sql_update = "SELECT * FROM User WHERE User.UserId = '{$_GET['idUser']}'";
        $rs = $db->query($sql_update);
        if($row = $rs->fetch_assoc()){
            $update_user = new user($row['UserId'],$row['Email'],$row['Password'],$row['UserName'],$row['Phone'],$row['Address']);
        }
    }
    if($_GET['adduser'] != null){
        $isAddUser = true;
    }
}else if($_SERVER['REQUEST_METHOD'] = 'POST'){
    if($_POST['searchValue'] != null){
        $searchValue = $_POST['searchValue'];
    }
}


$sqlUser = "SELECT * FROM User WHERE (User.UserName LIKE '%{$searchValue}%%' OR User.Email LIKE '%{$searchValue}%' OR '{$searchValue}' = -1)";
$listUser = array();

$rs = $db->query($sqlUser);
while($row = $rs->fetch_assoc()){
    $tmp = new user($row['UserId'],$row['Email'],$row['Password'],$row['UserName'],$row['Phone'],$row['Address']);
    array_push($listUser,$tmp);
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
                <a href="admin_view_user.php" class="list-group-item list-group-item-action active">Quản lý người dùng</a>
                <a href="admin_view_product.php" class="list-group-item list-group-item-action">Quản lý sản phẩm</a>
                <a href="admin_view_supplier.php" class="list-group-item list-group-item-action">Quản lý nhà phân phối</a>


            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="admin_view_user.php">Quản lý người dùng</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsExample07">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="admin_view_user.php?adduser=true">Thêm người dùng <span class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-md-0" action="admin_view_user.php" method="post">
                                <input class="form-control" type="text" placeholder="Tìm kiếm" aria-label="Search" name="searchValue">
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="card">
                <?php
                if($isAddUser == true){
                    echo"
                            <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4>Thêm người dùng</h4>
                            <hr>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <form action='admin_control.php' method='post' id='update-form'>
                                <div class='form-group row'>
                                    <label for='username' class='col-4 col-form-label'>Tên người dùng: </label>
                                    <div class='col-8'>
                                        <input id='username' name='UserName' placeholder='Họ và tên' class='form-control here' type='text' required='required'>
                                    </div>
                                </div>";
                    echo "
                                <div class='form-group row'>
                                    <label for='name' class='col-4 col-form-label'>Email: </label>
                                    <div class='col-8'>
                                       <input id='username' name='Email' placeholder='Email' class='form-control here' type='text' required='required'>
                                    </div>
                                </div>";
                    echo "
                                <div class='form-group row'>
                                    <label for='lastname' class='col-4 col-form-label'>Điện thoại: </label>
                                    <div class='col-8'>
                                        <input id='username' name='Phone' placeholder='Điện thoại' class='form-control here' type='number' >
                                    </div>
                                </div>
                                ";
                    echo "
                                <div class='form-group row'>
                                    <label for='text' class='col-4 col-form-label'>Địa chỉ: </label>
                                    <div class='col-8'>
                                        <input id='text' name='Address' placeholder='Địa chỉ' class='form-control here' type='text'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Mật khẩu:</label>
                                    <div class='col-8'>
                                        <input id='text' name='Email' placeholder='Mật khẩu' class='form-control here' type='text' required='required'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Quản trị viên:</label>
                                    <div class='col-8'>
                                        <input id='text' name='Manger' type='checkbox' value='true'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <div class='offset-4 col-8'>
                                        <button name='add_user' type='submit' value=' ' class='btn btn-primary'>Thêm</button>
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
                if(isset($update_user)){
                    echo"
                            <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4>Cập nhật người dùng</h4>
                            <hr>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <form action='admin_control.php' method='post' id='update-form'>
                                <div class='form-group row'>
                                    <label for='username' class='col-4 col-form-label'>Họ và tên: </label>
                                    <div class='col-8'>
                                        <input id='username' name='UserName' placeholder='Tên nhà sản xuất' class='form-control here' type='text' required='required' value='{$update_user->getUserName()}'>
                                    </div>
                                </div>";
                    echo "
                                <div class='form-group row'>
                                    <label for='name' class='col-4 col-form-label'>Email: </label>
                                    <div class='col-8'>
                                       <input id='username' name='Email' placeholder='Tên nhà sản xuất' class='form-control here' type='text' required='required' value='{$update_user->getEmail()}'>
                                    </div>
                                </div>";
                    echo "
                                <div class='form-group row'>
                                    <label for='lastname' class='col-4 col-form-label'>Số điện thoại: </label>
                                    <div class='col-8'>
                                        <input id='username' name='Phone' placeholder='Địa chỉ' class='form-control here' type='text' value='{$update_user->getPhone()}'>
                                    </div>
                                </div>
                                ";
                    echo "
                                <div class='form-group row'>
                                    <label for='text' class='col-4 col-form-label'>Địa chỉ: </label>
                                    <div class='col-8'>
                                        <input id='text' name='Address' placeholder='Số điện thoại' class='form-control here' type='number' value='{$update_user->getAddress()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <label for='select' class='col-4 col-form-label'>Mật khẩu:</label>
                                    <div class='col-8'>
                                        <input id='text' name='Password' placeholder='Password' class='form-control here' type='text' required='required' value='{$update_user->getPassword()}'>
                                    </div>
                                </div>
                                <div class='form-group row'>
                                    <div class='offset-4 col-8'>
                                        <input type='hidden' name='UserId' value='{$update_user->getUserId()}'>
                                        <button name='update_user' type='submit' value=' ' class='btn btn-primary'>Cập nhật</button>
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
                                <th scope="col" >Họ tên</th>
                                <th scope="col">Điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col" style="width: 50px"></th>
                                <th scope="col" style="width: 50px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listUser as $i){
                                echo "<tr>";
                                echo "
                                        <th scope='row'>{$i->getUserName()}</th>
                                        <td>{$i->getPhone()}</td>
                                        <td>{$i->getAddress()}</td>
                                        <td>
                                        <form action='admin_control.php' method='get'>
                                        <input type='hidden' name='idUser' value='{$i->getUserId()}'>
                                        <input type='submit' name='update_user' value='Thay đổi'>
                                        </form>
                                        </td>
                                        <td>
                                        <form action='admin_control.php' method='post'>
                                        <input type='hidden' name='idUser' value='{$i->getUserId()}'>
                                        <input type='submit' name='delete_user' value='Xóa'>
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
