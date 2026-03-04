<?php
require __DIR__ . '/config/autoloader.php';

use App\Controllers\NewsController;
use App\Utils\Path;

$controller = new NewsController();

if (isset($_GET['id'])) {
    $controller->selectedNewsPage($_GET['id']);
} else {
    $controller->allNewsPage();
}
