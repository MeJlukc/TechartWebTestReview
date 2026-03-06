<?php
namespace App\Controllers;

use App\Utils\Path;
use App\Utils\Template;

class Controller
{
    public function render($templateName, $data = [])
    {
        extract($data);

        $templatePath = Template::getPath($templateName);

        ob_start();
        require $templatePath;
        $content = ob_get_clean();

        require Path::getAbsolute('views/layouts/layout.php');
    }

    public function notFoundPage()
    {
        header("HTTP/1.0 404 Not Found");
        $this->render('errors.404');
    }

    public function homePage()
    {
        $this->render('home');
    }
}
