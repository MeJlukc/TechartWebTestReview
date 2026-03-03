<?php
require __DIR__ . '/config/config.php';
require ROOT . '/controllers/NewsController.php';

$controller = new NewsController();

if (isset($_GET['id'])) {
    $controller->selectedNewsPage($_GET['id']);
} else {
    $controller->allNewsPage();
}
