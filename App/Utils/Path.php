<?php

namespace App\Utils;

class Path
{
    public static function getAbsolute($path = '')
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        return $root . $path;
    } 
}
