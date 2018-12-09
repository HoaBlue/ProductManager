<?php
include_once 'layout/layout_top.php';
?>

    <!-- top layout here -->
    <div>

        <?php
        $listProduct = array();
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                if($_GET['pageIndex'] != null){
                    $pageIndex = $_GET['pageIndex'];
                }
                if($_GET['value'] != null){
                    $pageOffset = $pageIndex * $pageItem;
                    $value = $_GET['value'];
                    $hash = explode(" ",$value);
                    foreach ($hash as $i){
                        $sqlSearch =
                            "SELECT subtb.*, COUNT(Review.ReviewId) as num FROM ( (SELECT Product.* FROM Product WHERE ProductName LIKE '%{$i}%' OR Descriptions LIKE '%{$i}%')
                        UNION 
                        (SELECT Product.* FROM Product JOIN ProductCategory ON Product.CategoryId = ProductCategory.CategoryId WHERE ProductCategory.CategoryName LIKE '%{$i}%') 
                        UNION
                        (SELECT Product.* FROM Product JOIN Supplier ON Product.SupplierId = Supplier.SupplierId WHERE Supplier.FullName LIKE '%{$i}%' OR Supplier.TradeName LIKE '%{$i}%')) as subtb LEFT JOIN Review ON subtb.ProductId = Review.ProductId
                        GROUP BY (subtb.ProductId)
                        ";
                        $rs = $db->query($sqlSearch);
                        while ($row = $rs->fetch_assoc()){
                            $tmp = new product($row['ProductId'],$row['ProductName'],$row['Descriptions'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
                            $num = $row['num'];
                            $product_review_num = new product_review_num($tmp,$num);
                            array_push($listProduct,$product_review_num);
                        }
                    }

                }
            }


        ?>
        <h3 style="Text-align:Center; color:red"> Sản phẩm </h3>
        <div class="row">
           <?php
           foreach ($listProduct as $i){
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