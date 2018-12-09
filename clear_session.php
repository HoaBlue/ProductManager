<?php
/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-12-01
 * Time: 20:36
 */
session_start();
session_destroy();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentDateTime = date('H:i:s d-m-Y');
echo $currentDateTime;