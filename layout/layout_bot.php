
    </div>
    <div class="col-md-2">
        <ul class="list-group" style="text-align: center">
            <?php
                if(isset($user)){
                    echo "<li class=\"list-group-item text-muted\"><strong> {$user->getUserName()}</strong></li>";
                    echo "<li class=\"list-group-item text-left\"><a href='user_info.php'>Thông tin</a></li>";
                    echo "<li class=\"list-group-item text-left\"><a href='user_edit.php'>Chỉnh sửa thông tin</a></li>";
                    echo "<li class=\"list-group-item text-left\"><a href='pay_history.php'>Lịch sử mua hàng</a></li>";
                    echo "<li class=\"list-group-item text-left\"><a href='cart.php'>Giỏ hàng ({$cart->getQuantity()})</a></li>";
                    echo "<li class=\"list-group-item text-left\"><a href='user_control.php?signout=true'>Đăng Xuất</a></li>";
                }else{
                    echo "<li class=\"list-group-item text-left\"><a href='signup.php'>Đăng ký</a></li>";
                    echo "<li class=\"list-group-item text-left\"><a href='signin.php'>Đăng nhập</a></li>";
                }
            ?>

        </ul>
    </div>
</div>
<!-- /.container -->
<div class="container">
    <hr>
    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>hoatruongdev09</p>
            </div>
        </div>
    </footer>
</div>
<!-- /.container -->
<!-- jQuery -->
<script src="/Scripts/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/Scripts/bootstrap.min.js"></script>
</body>
</html>
<?php
$db->close();
?>
