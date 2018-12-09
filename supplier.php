<?php
include_once 'layout/layout_top.php';
?>

    <!-- top layout here -->
    <div>

        <?php

        $idSupplier;

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if($_GET['idSupplier'] != null){
                $idSupplier = $_GET['idSupplier'];
            }else{
                die("Không có nhà phân phối này");
            }
        }

        $sqlPhone = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product JOIN Supplier ON Product.SupplierId = Supplier.SupplierId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId LEFT JOIN Review ON Product.ProductId = Review.ProductId
                    WHERE Supplier.SupplierId = {$idSupplier} AND ProductCategory.CategoryName LIKE '%Điện thoại%' 
                    GROUP BY Product.ProductId
                    LIMIT 3";
        $sqlTablet = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product JOIN Supplier ON Product.SupplierId = Supplier.SupplierId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId LEFT JOIN Review ON Product.ProductId = Review.ProductId
                    WHERE Supplier.SupplierId = {$idSupplier} AND ProductCategory.CategoryName LIKE '%Máy tính bảng%' 
                    GROUP BY Product.ProductId
                    LIMIT 3";
        $sqlLaptop = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product JOIN Supplier ON Product.SupplierId = Supplier.SupplierId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId LEFT JOIN Review ON Product.ProductId = Review.ProductId
                    WHERE Supplier.SupplierId = {$idSupplier} AND ProductCategory.CategoryName LIKE '%Laptop%' 
                    GROUP BY Product.ProductId
                    LIMIT 3";

        $listPhone = array();
        $listTablet = array();
        $listLaptop = array();

        $rsPhone = $db->query($sqlPhone);
        while($row = $rsPhone->fetch_assoc()){
            //echo $row['ProductId'].' '.$row['ProductName'].' '.$row['Descriptions'].' '.$row['SupplierId'].' '.$row['CategoryId'].' '.$row['TypeOfUnit'].' '.$row['SuggestedPrice'].' '.$row['Image'].'\n';
            $tmp = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
            $num = $row['num'];
            $product_review_num = new product_review_num($tmp,$num);
            array_push($listPhone,$product_review_num);
        }

        $rsTablet = $db->query($sqlTablet);
        while($row = $rsTablet->fetch_assoc()){
            //echo $row['ProductId'].' '.$row['ProductName'].' '.$row['Descriptions'].' '.$row['SupplierId'].' '.$row['CategoryId'].' '.$row['TypeOfUnit'].' '.$row['SuggestedPrice'].' '.$row['Image'].'\n';
            $tmp = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
            $num = $row['num'];
            $product_review_num = new product_review_num($tmp,$num);
            array_push($listTablet,$product_review_num);
        }

        $rsLaptop = $db->query($sqlLaptop);
        while($row = $rsLaptop->fetch_assoc()){
            //echo $row['ProductId'].' '.$row['ProductName'].' '.$row['Descriptions'].' '.$row['SupplierId'].' '.$row['CategoryId'].' '.$row['TypeOfUnit'].' '.$row['SuggestedPrice'].' '.$row['Image'].'\n';
            $tmp = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
            $num = $row['num'];
            $product_review_num = new product_review_num($tmp,$num);
            array_push($listLaptop,$product_review_num);
        }

        ?>

            <?php
            if(isset($listPhone) AND sizeof($listPhone) != 0){
                echo "
                <h3 style='Text-align:Center; color:red'> Điện thoại </h3>
                <div class='row'>
                ";
                foreach ($listPhone as $i){
                    echo "
                             <div class='col-sm-4 col-lg-4 col-md-4'>
                                <div class='thumbnail'>
                                    <a href='product_detail.php?idProduct={$i->product->getProductId()}'>
                                        <img alt='{$i->product->getProductName()}' src='{$i->product->getImage()}' style='width: 200px; height: 200px'/>
                                        <div>
                                            <br />
                                            <h4 style='text-align:center'>
                                                {$i->product->getProductName()}
                                            </h4>
                                            <p></p>
                                        </div>
                                        <div class='atings'>
                                            <p class='pull-right'>{$i->getReviewNum()} reviews</p>
                                            <p>
                                                <span>".number_format($i->product->getSuggestedPrice())." VND</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            ";
                }
                if(sizeof($listPhone) >=3){
                    echo "<a href='phone.php?idSupplier={$idSupplier}'>>>Xem Thêm</a>";
                }
                echo " </div>";
            }else{
            }

            ?>

            <?php
            if(isset($listTablet) AND sizeof($listTablet) !=0 ){
                echo "
                <h3 style='Text-align:Center; color:red'> Máy tính bảng </h3>
                <div class='row'>
                ";
                foreach ($listTablet as $i){
                    echo "
                             <div class='col-sm-4 col-lg-4 col-md-4'>
                                <div class='thumbnail'>
                                    <a href='product_detail.php?idProduct={$i->product->getProductId()}'>
                                        <img alt='{$i->product->getProductName()}' src='{$i->product->getImage()}' style='width: 200px; height: 200px'/>
                                        <div>
                                            <br />
                                            <h4 style='text-align:center'>
                                                {$i->product->getProductName()}
                                            </h4>
                                            <p></p>
                                        </div>
                                        <div class='atings'>
                                            <p class='pull-right'>{$i->getReviewNum()} reviews</p>
                                            <p>
                                                <span>".number_format($i->product->getSuggestedPrice())." VND</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            ";
                }
                if(sizeof($listTablet) >= 3){
                    echo "<a href='tablet.php?idSupplier={$idSupplier}'>>>Xem Thêm</a>";
                }
                echo " </div>";
            }
            ?>
            <?php
            if(isset($listLaptop) AND sizeof($listLaptop) != 0) {
                echo "
                <h3 style='Text-align:Center; color:red'> Laptop </h3>
                <div class='row'>
                ";
                foreach ($listLaptop as $i) {
                    echo "
                             <div class='col-sm-4 col-lg-4 col-md-4'>
                                <div class='thumbnail'>
                                    <a href='product_detail.php?idProduct={$i->product->getProductId()}'>
                                        <img alt='{$i->product->getProductName()}' src='{$i->product->getImage()}' style='width: 200px; height: 200px'/>
                                        <div>
                                            <br />
                                            <h4 style='text-align:center'>
                                                {$i->product->getProductName()}
                                            </h4>
                                            <p></p>
                                        </div>
                                        <div class='atings'>
                                            <p class='pull-right'>{$i->getReviewNum()} reviews</p>
                                            <p>
                                                <span>".number_format($i->product->getSuggestedPrice())." VND</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            ";
                }
                if(sizeof($listLaptop) >= 3){
                    echo "<a href='laptop.php?idSupplier={$idSupplier}'>>>Xem Thêm</a>";
                }
                echo " </div>";
            }
            ?>
<!--        <div class="row">-->
<!--            Trang 1/3;-->
<!--            <div class="MenuTrang">-->
<!---->
<!--                <div class="pagination-container"><ul class="pagination"><li class="active"><a>1</a></li><li><a href="/BookStore?page=2">2</a></li><li><a href="/BookStore?page=3">3</a></li><li class="PagedList-skipToNext"><a href="/BookStore?page=2" rel="next">»</a></li></ul></div>-->
<!--            </div>-->
<!--            <style>-->
<!--                .MenuTrang li {-->
<!--                    display: inline;-->
<!--                }-->
<!--            </style>-->
<!--        </div>-->

    </div>


    <!-- bot layout here -->
<?php
include_once 'layout/layout_bot.php';
?>