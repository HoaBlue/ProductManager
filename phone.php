<?php
include_once 'layout/layout_top.php';
?>

    <!-- top layout here -->
    <div>

        <?php
        $pageItem = 6;
        $pageIndex = 0;
        $idSupplier = -1;
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if($_GET['idSupplier'] != null){
                $idSupplier = $_GET['idSupplier'];
            }
            if($_GET['pageIndex'] != null){
                $pageIndex = $_GET['pageIndex'];
            }
        }
        $pageOffset = $pageIndex * $pageItem;
        $sqlPhone = "SELECT Product.*, COUNT(Review.ReviewId) as num FROM Product LEFT JOIN Review ON Product.ProductId = Review.ProductId LEFT JOIN User ON Review.UserId = User.UserId JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId JOIN Supplier On Product.SupplierId = Supplier.SupplierId
                      WHERE ProductCategory.CategoryName LIKE 'Điện thoại' AND (Supplier.SupplierId = {$idSupplier} OR {$idSupplier} = -1)
                      GROUP BY Product.ProductId LIMIT 6 OFFSET {$pageOffset}";
        $sqlCount = "SELECT COUNT(Product.ProductId) AS amount FROM Product JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId  JOIN Supplier On Product.SupplierId = Supplier.SupplierId
                      WHERE ProductCategory.CategoryName Like 'Điện thoại' AND (Supplier.SupplierId = {$idSupplier} OR $idSupplier = -1)";

        $listPhone = array();
        $count = 0;

        $rsPhone = $db->query($sqlPhone);
        while($row = $rsPhone->fetch_assoc()){
            //echo $row['ProductId'].' '.$row['ProductName'].' '.$row['Descriptions'].' '.$row['SupplierId'].' '.$row['CategoryId'].' '.$row['TypeOfUnit'].' '.$row['SuggestedPrice'].' '.$row['Image'].'\n';
            $tmp = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
            $num = $row['num'];
            $product_review_num = new product_review_num($tmp,$num);
            array_push($listPhone,$product_review_num);
        }
        $rsCount = $db->query($sqlCount);
        if($row = $rsCount->fetch_assoc()){
            $count = $row['amount'];
        }
        ?>
        <h3 style="Text-align:Center; color:red"> Điện thoại </h3>
        <div class="row">
            <?php
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
            ?>
        </div>
        <div class="row">
            <div class='MenuTrang'>
                <div class='pagination-container'>
                    <ul class='pagination'>
                        <?php
                        $pageCount = $count / $pageItem;
                        $pageCount = round($pageCount) + 1;
                        $currentPage = $pageIndex + 1;
                            for($i = 0; $i < $pageCount;$i++){
                                $index = $i + 1;
                                if($index == $currentPage){
                                    echo "<li class='active'><a>{$index}</a></li>";
                                }else{
                                    echo "<li><a href='phone.php?idSupplier={$idSupplier}&pageIndex={$i}'>{$index}</a></li>";
                                }
                            }
                            if($count > ($pageIndex * $pageItem) + $pageItem){
                                echo "<li class='PagedList-skipToNext'><a href='phone.php?idSupplier={$idSupplier}&pageIndex={$currentPage}' rel='next'>»</a></li> ";
                            }
                        ?>

                    </ul>
                </div>
            </div>
            <style>
                .MenuTrang li {
                    display: inline;
                }
            </style>
        </div>

    </div>


    <!-- bot layout here -->
<?php
include_once 'layout/layout_bot.php';
?>