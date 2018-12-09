<?php
    include_once 'layout/layout_top.php'
?>
    <!-- layout top here -->
            <div>
                <h2 style="text-align:center">THÔNG TIN GIỎ HÀNG</h2>

                <table class='table table-hover' style='text-align: center'>
                    <thead>
                    <tr>
                        <th scope='col' style='width: 70px; text-align: center'></th>
                        <th scope='col' style='width: 150px; text-align: center'>Tên sản phẩm</th>
                        <th scope='col' style='width: 150px; text-align: center'>Đơn giá</th>
                        <th scope='col' style='width: 150px; text-align: center'>Thành tiền</th>
                        <th scope='col' style='width: 70px; text-align: center'>Số lượng</th>
                        <td width='50px' style='width: 70px; text-align: center'></td>
                        <td width='50px' style='width: 70px; text-align: center'></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once 'models/ItemCart.php';
                    $totalPrice = 0;
                    foreach($cart->listItem as $i){
                        $price = $i->product->getSuggestedPrice() * $i->quantity;
                        $totalPrice += $price;
                        echo "
                         <tr>
                            <td><a href='product_detail.php?idProduct={$i->product->getProductid()}'><img src='{$i->product->getImage()}' width='100%' style='width: 70px'></a> </td>
                            <td style='text-align: center' scope='row'>{$i->product->getProductName()}</td>
                            <td style='text-align: center' scope='row'>{$i->product->getSuggestedPrice()}</td>
                            <td style='text-align: center' scope='row'>{$price}</td>
                            <form action='cart_control.php' method='post'>
                                <td>
                                    <input type='hidden' name='idProduct' value='{$i->product->getProductid()}'>
                                    <input type='number' min='1' name='quantity' value='{$i->getQuantity()}'>
                                </td>
                                <td> <input type='submit' name='delete' value='Xóa'></td>
                                <td> <input type='submit' name='update'value='Cập Nhật'></td>
                            </form>
                        </tr>
                        ";
                    }
                        echo "
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Tổng tiền: </td>
                            <td>{$totalPrice} VND</td>
                            <form action='cart_control.php' method='post'>
                            <td><input type='submit' name='pay' value='Thanh toán'></td>
                            <td></td>
                            <td><input type='submit' name='continue' value='Tiếp tục mua sắm'></td>
                            </form>
                        </tr>
                        ";
                    ?>

                    </tbody>
                </table>
            </div>

        <!-- layout bot here -->

<?php
    include_once 'layout/layout_bot.php'
?>
