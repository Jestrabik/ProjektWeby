<?php

namespace App\Libraries;

/**
 * Třída pro práci s uploadem obrázků.
 */
class ImageLibrary
{
    /**
     * Uloží nahraný obrázek do složky.
     * @param \CodeIgniter\HTTP\Files\UploadedFile $file
     * @param string $uploadPath
     * @return string|false Název uloženého souboru nebo false při chybě
     */
    public static function upload($file, $uploadPath)
    {
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
            return $newName;
        }
        return false;
    }
}