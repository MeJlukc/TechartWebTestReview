<?php
require __DIR__ . '/config/config.php';
require ROOT . '/App/Controllers/NewsController.php';

use App\Controllers\NewsController;

$controller = new NewsController();

if (isset($_GET['id'])) {
    $controller->selectedNewsPage($_GET['id']);
} else {
    $controller->allNewsPage();
}
