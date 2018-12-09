<?php
include_once 'layout/layout_top.php';
?>
<?php
if(!isset($user)){
    header('location:'.'index.php');
}
?>

<div>
    <table class="table table-sm">
        <tbody>
        <tr>
            <th scope="row">Họ và tên: </th>
            <td><?php echo "{$user->getUserName()}"?></td>
        </tr>
        <tr>
            <th>Email: </th>
            <td scope="row"><?php echo "{$user->getEmail()}"?></td>
        </tr>
        <tr>
            <th>Số điện thoại: </th>
            <td scope="row"><?php echo "{$user->getPhone()}" ?></td>
        </tr>
        <tr>
            <th>Địa chỉ: </th>
            <td scope="row"><?php echo "{$user->getAddress()}"?></td>
        </tr>
        </tbody>
    </table>


</div>

<?php
include_once 'layout/layout_bot.php';
?>
