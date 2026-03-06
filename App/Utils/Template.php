<?php

namespace App\Utils;

use \Exception;

class Template
{
    public static function getPath($templateName)
    {
        $extensions = ['.php', '.twig', '.pug'];

        $templateName = str_replace('.', '/', $templateName);
        
        foreach ($extensions as $extension) {
            $templatePath = Path::getAbsolute("views/templates/" . $templateName . $extension);

            if (file_exists($templatePath)) {
                return $templatePath;
            }
        }

        throw new Exception("Template $templateName does not exist");
    }
}
