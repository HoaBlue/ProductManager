<?php
    include_once 'layout/layout_top.php';
?>
<?php
$error;
if(isset($_SESSION['signup_error'])){
    $error = $_SESSION['signup_error'];
}
if(isset($error)){
    echo "<p>";
    foreach ($error as $i){
        echo "$i. ";
    }
    echo "</p>";
}
?>
    <div>
        <div style="width: 50%; padding-left: 10%;padding-right: 10%; margin-left: 20%; margin-right: 20%">
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Đăng ký</h1>
                        <hr />
                    </div>
                </div>
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action="user_control.php">

                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Họ và tên</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Mật khẩu</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password1" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm" class="cols-sm-2 control-label">Xác nhận mật khẩu</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password2" id="password"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="register" value=" ">Đăng ký</button>
                        </div>
                        <div class="login-register">
                            <a href="signin.php">Đã có tài khoản? Đăng nhập.</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

<?php
    include_once 'layout/layout_bot.php';
?>
