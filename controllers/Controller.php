<?php
require ROOT . '/controllers/NewsController.php';

class Controller
{
    public static function index()
    {
        if (isset($_GET['id'])) {
            $newsController = new NewsController();
            $newsController->selectedNews($_GET['id']);
        } else {
            $newsController = new NewsController();
            $newsController->allNews();
        }
    }
}
