<?php
    include_once 'layout/layout_top.php';
    include_once 'models/user_review.php';
    include_once 'models/user.php';
    include_once 'models/review.php';
?>
    <!-- layout top here-->
<?php
    $idProduct;
    if($_SERVER['REQUEST_METHOD'] == 'GET' AND $_GET['idProduct'] != null){
        $idProduct = $_GET['idProduct'];


    }else{
        header('Location:'.'index.php');
    }

?>

<?php
    include_once 'models/product.php';

    $sqlDetail = "SELECT Product.*, Supplier.TradeName, ProductCategory.CategoryName FROM Product JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId JOIN Supplier On Product.SupplierId = Supplier.SupplierId
                  WHERE Product.ProductId = {$idProduct} ";
    $sqlImages= "SELECT ProductPhoto.FileName FROM ProductPhoto WHERE ProductPhoto.ProductId = '{$idProduct}'";
    $sqlReview = "SELECT Review.*,User.* FROM Product LEFT JOIN Review ON Product.ProductId = Review.ProductId LEFT JOIN User ON Review.UserId = User.UserId WHERE Product.ProductId = '{$idProduct}'";
    $rs = $db->query($sqlDetail);
    $productDetail;
    $supplierName;
    $categoryName;
    $listImage = array();
    if($row = $rs->fetch_assoc()){
        $productDetail = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
        $supplierName = $row['TradeName'];
        $categoryName = $row['CategoryName'];
    }
    $rs = $db->query($sqlImages);
    while($row = $rs->fetch_assoc()){
        array_push($listImage,$row['FileName']);
    }
    $listReview = array();

    $rs = $db->query($sqlReview);
    while($row = $rs->fetch_assoc()){
        $usr = new user($row['UserId'],$row['Email'],$row['Password'],$row['UserName'],$row['Phone'],$row['Address']);
        $rw = new review($row['ReviewId'],$row['ProductId'],$row['UserId'],$row['Content'], $row['CommentDate']);
        $tmp = new user_review($usr,$rw);
        array_push($listReview,$tmp);
    }

?>
    <div class="row">


        <style type="text/css">
            #Datmua a {
                clear: both;
                background-color: red;
                color: white;
                width: 120px;
                height: 35px;
                display: block;
                float: right;
                text-align: center;
                padding-top: 10px;
                text-decoration: none;
                font-weight: bold;
            }

            #Datmua a:hover {
                background-color: gray;
                color: red;
            }
        </style>
        <?php
            if(isset($productDetail)){
                $redirect = 'window.location.href = "cart_control.php?action=add&idProduct='.$productDetail->getProductId().'"';
                echo "
                <div class='row'>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        <img src='{$productDetail->getImage()}' style='height: 200px; width: 200px'>
                    </div>
                    <div class='col-md-7'>
                        <div class='row'>
                            <div class='row'>
                                <p>{$productDetail->getProductName()} <strong style='font-size: 16pt; color: #eb4d4b; padding-left: 10px'>".number_format($productDetail->getSuggestedPrice())."</strong> VNĐ</p>
                            </div>
                            <div class='row'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>
                                    <strong>Khuyến mãi: </strong><span>Áp dụng dự kiến từ ngày 6/9/2096</span>
                                    </div>
                                    <div class='panel-body'>
                                    Cứ mỗi 10 sản phẩm bạn mua cơ hội trúng Vietlot của bạn tăng 5%.
                                    </div>
                                </div>
                            </div>                                    
                            
                            
                        </div>
                        <div class='row'>
                            <div class='row'>
                                <button name='public_comment' onclick='{$redirect}' class='btn btn-primary' style='width: 100%; height: 100%; min-height: 50px'> ĐẶT MUA NGAY</button>
                            </div>
                        </div>
                    </div>
                </div>
                 ";
            }else{
                echo "Không có sản phẩm này";
            }
        ?>

    </div>
    <?php
        if(isset($productDetail)){

            echo "
                <div class='row'>
                     <h3>Mô tả sản phẩm: </h3>
                     <textarea id='publicinfo' name='Descriptions' cols='40' rows='30' class='form-control' readonly>{$productDetail->getDescriptions()}</textarea>
                </div>
                ";
        }
    ?>
    <div class="row">
        <h3>Hình ảnh: </h3>
        <?php
        if(isset($productDetail)){
            foreach ($listImage as $i){
                echo "
                         <div class='col-sm-4 col-lg-4 col-md-4'>
                                <div class='thumbnail'>
                                        <img src='{$i}' style='width: 400px; height: auto'/>
                                </div>
                            </div>
                    ";
            }
        }
        ?>

    </div>
    <div class="row">
        <h3>Đánh giá: </h3>
        <div class="row">
            <div class="row">
                <?php
                if(isset($user)){
                    echo "
                     <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <strong>{$user->getUserName()}</strong><span class='text-muted' style='margin-left: 10px'>Đánh giá: </span>
                        </div>
                        <div class='panel-body'>
                            <form action='user_control.php' method='post'>
                                <textarea id='publicinfo' name='comment' cols='40' rows='5' class='form-control'></textarea>
                                <input type='hidden' name='idUser' value='{$user->getUserId()}'>
                                <input type='hidden' name='idProduct' value='{$productDetail->getProductId()}'>
                                <button name='public_comment' type='submit' value=' ' class='btn btn-primary' style='padding: 10px 10px 10px 10px; margin: 10px 10px 0px 20px'>Đánh giá</button>
                            </form>
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                    ";
                }else{
                    $redirect = 'window.location.href = "signin.php"';
                    echo "
                        
                     <div class='panel panel-default' style='text-align: center'>
                        <button name='public_comment' onclick='{$redirect}' class='btn btn-primary' style='margin: 30px 30px 30px 30px'>Đăng nhập để đánh giá</button>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>

        <?php
        if(isset($productDetail)){
            if(isset($listReview) AND sizeof($listReview)>0){
                foreach ($listReview as $i){
                    echo "
                             <div class='row'>
                                    <div class='row'>
                                        <div class='panel panel-default'>
                                            <div class='panel-heading'>
                                                <strong>{$i->user->getUserName()}</strong><span class='text-muted' style='margin-left: 10px'>Commented on {$i->review->getCommentDate()}</span>
                                            </div>
                                            <div class='panel-body'>
                                                {$i->review->getContent()}
                                            </div><!-- /panel-body -->
                                        </div><!-- /panel panel-default -->
                                    </div>
                                </div>
                        ";
                }
            }
        }
        ?>

    </div>


<!-- laytout bot here -->
 <?php

    include_once 'layout/layout_bot.php';
?>