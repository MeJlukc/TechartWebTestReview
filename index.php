<?php
require __DIR__ . '/config/autoloader.php';

use App\Controllers\Controller;
use App\Controllers\NewsController;
use App\Utils\Path;

$controller = new Controller();
$newsController = new NewsController();

$requestUri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($requestUri, '/'));

if ($parts[0] == 'news') {
    if (isset($parts[1]) && preg_match('/^\d+$/', $parts[1])) {
        $newsController->selectedNewsPage($parts[1]);
    } elseif (isset($parts[1]) && preg_match('/^page-\d+$/', $parts[1])) {
        $arrayParts = explode('-', $parts[1]);

        $pageNumber = end($arrayParts);
        $pageNumberToInt = (int)$pageNumber;
        
        $newsController->allNewsPage($pageNumberToInt);
    } else {
        $newsController->allNewsPage();
    }
} else {
    $controller->homePage();
}