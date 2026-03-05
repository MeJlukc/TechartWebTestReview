<?php

namespace App\Utils;

class Template
{
    public static function getPathByName($templateName)
    {
        $templateFullName = null;

        $files = scandir(Path::getAbsolute('views/templates/'));
        foreach ($files as $file) {
            $splittedFile = explode('.', $file);
            $fileName = $splittedFile[0];

            if ($fileName == $templateName) {
                $templateFullName = $file;
                break;
            }
        }

        if (!$templateFullName) {
            return "Template $templateName does not exist";
        }

        $templatePath = Path::getAbsolute('views/templates/' . $templateFullName);

        return $templatePath;
    }
}
