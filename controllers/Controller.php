<?php
require ROOT . '/controllers/NewsController.php';

class Controller
{
    public static function index()
    {
        if (isset($_GET['id'])) {
            NewsController::selectedNewsPage($_GET['id']);
        } else {
            NewsController::allNewsPage();
        }
    }
}
