<?php
require ROOT . '/controllers/NewsController.php';

class Controller
{
    public static function index()
    {
        if (isset($_GET['id'])) {
            $newsController = new NewsController();
            $newsController->selectedNewsPage($_GET['id']);
        } else {
            $newsController = new NewsController();
            $newsController->allNewsPage();
        }
    }
}
