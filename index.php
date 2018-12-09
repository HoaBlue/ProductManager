<?php
    include_once 'layout/layout_top.php';
?>

            <!-- top layout here -->
            <div>

                <?php


                    $sqlPhone = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product LEFT JOIN Review ON Product.ProductId = Review.ProductId LEFT JOIN User ON Review.UserId = User.UserId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId 
WHERE                             ProductCategory.CategoryName LIKE 'Điện thoại'
GROUP                             BY Product.ProductId LIMIT 6";
                    $sqlTablet = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product LEFT JOIN Review ON Product.ProductId = Review.ProductId LEFT JOIN User ON Review.UserId = User.UserId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId 
WHERE                             ProductCategory.CategoryName LIKE 'Máy tính bảng'
GROUP                             BY Product.ProductId LIMIT 6";
                    $sqlLaptop = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product LEFT JOIN Review ON Product.ProductId = Review.ProductId LEFT JOIN User ON Review.UserId = User.UserId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId 
WHERE                             ProductCategory.CategoryName LIKE 'Laptop'
GROUP                             BY Product.ProductId LIMIT 6";

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
                <h3 style="Text-align:Center; color:red"> Điện thoại </h3>
                <div class="row">
                    <?php
                        foreach ($listPhone as $i){
                            //var_dump($i);
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
                    ?>

                    <a href="phone.php">>>Xem Thêm</a>
                </div>
                <div class="row"><h3 style="text-align:Center; color:red"> Máy tính bảng </h3></div>
                <div class="row">
                    <?php
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
                    ?>
                    <a href="tablet.php">>>Xem Thêm</a>
                </div>
                <div class="row"><h3 style="Text-align:Center; color:red"> Laptop </h3></div>
                <div class="row">
                    <?php
                    foreach ($listLaptop as $i){
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
                    ?>
                    <a href="laptop.php">>>Xem Thêm</a>
                </div>
                <div class="row">
                </div>

        </div>


         <!-- bot layout here -->
  <?php
    include_once 'layout/layout_bot.php';
?>