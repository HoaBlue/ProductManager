<?php
include_once 'layout/layout_top.php'
?>
<!-- layout top here -->
<div>

    <h2 style="text-align:center">Lịch sử mua hàng</h2>

    <table class='table table-hover' style='text-align: center'>
        <thead>
        <tr>
            <th scope='col'></th>
            <th scope='col' style='text-align: center'>Tên sản phẩm</th>
            <th scope='col' style='text-align: center'>Đơn giá</th>
            <th scope='col' style='text-align: center'>Thành tiền</th>
            <th scope='col' style='text-align: center'>Số lượng</th>
            <th scope='col' style='text-align: center'>Ngày mua</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'models/ItemCart.php';
        include_once 'models/product.php';
        include_once 'models/pay_history.php';
        if(!isset($user)){
            header('location:'.'signin.php');
        }
        $sql_history = "SELECT Product.*, PayTime, Quantity FROM Product JOIN Bill ON Product.ProductId = Bill.ProductId
                        WHERE Bill.UserId = {$user->getUserId()}";
        $rs = $db->query($sql_history);
        $cart_bill = array();
        while($row = $rs->fetch_assoc()){
            $item_product = new product($row['ProductId'],$row['ProductName'],$row['Description'],$row['SupplierId'],$row['CategoryId'],$row['TypeOfUnit'],$row['SuggestedPrice'],$row['Image']);
            $item_quantity = $row['Quantity'];
            $item_date = $row['PayTime'];
            $pay_history = new pay_history($item_product,$item_quantity,$item_date);
            array_push($cart_bill, $pay_history);
        }
        foreach($cart_bill as $i){
            $price = $i->item->getSuggestedPrice() * $i->quantity;
            //var_dump($i);
            echo "
                         <tr>
                            <td><a href='product_detail.php?idProduct={$i->item->getProductid()}'><img src='{$i->item->getImage()}' width='100%' style='width: 70px'></a> </td>
                            <td style='text-align: center' scope='row'>{$i->item->getProductName()}</td>
                            <td style='text-align: center' scope='row'>{$i->item->getSuggestedPrice()}</td>
                            <td style='text-align: center' scope='row'>{$price}</td>
                            <td style='text-align: center' scope='row'>{$i->getQuantity()}</td>
                            <td style='text-align: center' scope='row'>{$i->getDate()}</td>
                        </tr>
                        ";
        }
        ?>

        </tbody>
    </table>
</div>

<!-- layout bot here -->

<?php
include_once 'layout/layout_bot.php'
?>
