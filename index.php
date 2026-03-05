<?php
require __DIR__ . '/config/autoloader.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '#^/$#' => ['Controller', 'homePage'],
    '#^/news/$#' => ['NewsController', 'allNewsPage'],
    '#^/news/page-(\d+)/$#' => ['NewsController', 'allNewsPage'],
    '#^/news/(\d+)/$#' => ['NewsController', 'selectedNewsPage'],
    '#^.*$#' => ['Controller', 'notFoundPage'],
];

foreach ($routes as $route => [$controllerName, $action]) {
    if (preg_match($route, $requestUri, $matches)) {
        $fullClassName = "\\App\\Controllers\\" . $controllerName;
        $controller = new $fullClassName();

        if (isset($matches[1])) {
            array_shift($matches);
            $controller->$action(...$matches);
            break;
        }
        
        $controller->$action();
        break;
    }
}
