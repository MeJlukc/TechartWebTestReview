<?php
namespace App\Controllers;

use App\Utils\Path;

class Controller
{
    public function render($templatePath, $data = [])
    {
        extract($data);
        
        ob_start();
        require Path::getAbsolute($templatePath);
        $content = ob_get_clean();

        require Path::getAbsolute('views/layout.php');
    }

    public function notFoundPage()
    {
        header("HTTP/1.0 404 Not Found");
        $this->render('views/pages/404.php');
    }

    public function homePage()
    {
        $this->render('views/pages/home.php');
    }
}
