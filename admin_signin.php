<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Admin sign in</title>
</head>
<?php
    session_start();
    if($_GET['error'] != null  && $_SESSION['error_admin'] != null){
        $error = $_SESSION['error_admin'];
    }
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <?php
                if(isset($error)){
                    echo "<p>{$error}</p>";
                }
            ?>
        </div>
        <div class="col-md-4">

        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <div class="card card-container" style="width: 100%">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img src="images/log-in.png" style="width: 300px; height: 300px" >
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="admin_control.php" method="post">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus >
                    <div style="width: 100%; height: 10px"></div>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required >
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me" name="remember"> Ghi nhớ
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="admin_signin" value=" ">Đăng nhập</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
        </div>
        <div class="col-md-4">

        </div>
    </div>

</div><!-- /container -->
</body>
</html>