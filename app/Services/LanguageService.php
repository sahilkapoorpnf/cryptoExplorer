<?php

namespace App\Services;


use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class LanguageService
{
    public static function all()
    {
        $adapter = new Local(resource_path('lang/'));

        $filesystem = new Filesystem($adapter);

        $contents = $filesystem->listContents();

        $langs = [];

        foreach ($contents as $item) {
            if ($item['type'] == 'dir') {
                $langs[] = $item['basename'];
            }
        }

        return $langs;
    }
}