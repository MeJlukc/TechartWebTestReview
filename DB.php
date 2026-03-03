<?php
// require ROOT . "/dbconfig.php";

class DB
{
    public static function getConnection()
    {
        $params = require ROOT . '/config/db_config.php';

        return new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8", 
            $user, 
            $password
        );
    }
}
