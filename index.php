<?php
require __DIR__ . '/config/config.php';
require __DIR__ . '/config/autoloader.php';

use App\Controllers\NewsController;

$controller = new NewsController();

if (isset($_GET['id'])) {
    $controller->selectedNewsPage($_GET['id']);
} else {
    $controller->allNewsPage();
}
