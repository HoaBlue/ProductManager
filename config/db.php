<?php

/**
 * Created by PhpStorm.
 * User: truonghoa
 * Date: 2018-11-29
 * Time: 17:08
 */

class Database
{
    public static $db;
    public static $servername = 'mysql';
    public static $username = 'root';
    public static $password = 'root';
    public static $dbname = 'ProductManager';

    public static function connect()
    {
        if (!self::$db) {
            self::$db = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
            if (self::$db->connect_error) {
                die(self::$db->connect_error);
            }
        }
        return self::$db;
    }
}