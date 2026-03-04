<?php
namespace App\Controllers;

use App\Utils\Path;

class Controller
{
    public function notFoundPage()
    {
        header("HTTP/1.0 404 Not Found");
        require Path::getAbsolute('Views/404.php');
    }
}