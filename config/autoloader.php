<?php
spl_autoload_register(function($className) {
    $path = str_replace('\\', '/', $className);
    $file = dirname(__DIR__) . '/' . $path . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});
