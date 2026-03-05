<?php
namespace App\Controllers;

use App\Utils\Path;

class Controller
{
    public function notFoundPage()
    {
        header("HTTP/1.0 404 Not Found");
        require Path::getAbsolute('views/pages/404.php');
    }

    public function homePage()
    {
        require Path::getAbsolute('views/pages/home.php');
    }
}