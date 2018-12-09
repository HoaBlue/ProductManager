<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-09
 * Time: 16:04
 */
session_start();
unset($_SESSION['admin']);
header('location:'.'admin_dashboard.php');