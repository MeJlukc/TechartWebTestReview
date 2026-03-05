<?php
require __DIR__ . '/config/autoloader.php';

use App\Controllers\Controller;
use App\Controllers\NewsController;
use App\Utils\Path;

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$controller = new Controller();
$newsController = new NewsController();

$routes = [
    '#^/$#' => function() use ($controller) {
        $controller->homePage();
    },
    '#^/news/$#' => function() use ($newsController) {
        $newsController->allNewsPage();
    },
    '#^/news/page-(\d+)/$#' => function($pageNumber) use ($newsController) {
        $newsController->allNewsPage($pageNumber);
    },
    '#^/news/(\d+)/$#' => function($id) use ($newsController) {
        $newsController->selectedNewsPage($id);
    },
    '#^.*$#' => function() use ($controller) {
        $controller->notFoundPage();
    },
];

foreach ($routes as $route => $action) {
    if (preg_match($route, $requestUri, $matches)) {

        if (isset($matches[1])) {
            array_shift($matches);
            $action(...$matches);
            break;
        }

        $action();
        break;
    }
}
