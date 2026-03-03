<?php

namespace App\utils;

use PDO;

class DB
{
    private static $connection = null;

    public static function getConnection()
    {
        $params = require ROOT . '/config/db_config.php';

        if (self::$connection) {
            return self::$connection;
        }

        self::$connection = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8", 
            $user, 
            $password
        );

        return self::$connection;
    }
}
