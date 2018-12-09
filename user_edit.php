<?php
include_once 'layout/layout_top.php';
?>
<?php
if(!isset($user)){
    header('location:'.'index.php');
}
$edit_error;
if(isset($_SESSION['user_update_error'])){
    $edit_error = $_SESSION['user_update_error'];
}
?>

<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Cập nhật thông tin</h4>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($edit_error)){
                            foreach ($edit_error as $i) {
                                echo "<h5>{$i}</h5>";
                            }
                        }
                    ?>
                    <form action="user_control.php" method="post">
                        <div class="form-group row">
                            <label for="username" class="col-4 col-form-label">Họ và tên</label>
                            <div class="col-8">
                                <input id="username" name="username" value="<?php echo "{$user->getUserName()}" ?>" class="form-control here" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email</label>
                            <div class="col-8">
                                <input id="email" name="email" value="<?php echo "{$user->getEmail()}" ?>" class="form-control here"  type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-4 col-form-label">Số điện thoại</label>
                            <div class="col-8">
                                <input id="phone" name="phone" placeholder="<?php echo "{$user->getPhone()}" ?>" class="form-control here" type="number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-4 col-form-label">Địa chỉ</label>
                            <div class="col-8">
                                <input id="address" name="address" placeholder="<?php echo "{$user->getAddress()}" ?>" class="form-control here" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-4 col-8">
                                <button name="update" type="submit" class="btn btn-primary" value=" ">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>

<?php
include_once 'layout/layout_bot.php';
?>
<!--required="required"-->