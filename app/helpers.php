<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class helpers
{
    static function uploadFile($files, $folder)
    {
        if (!is_array($files)) $files = [$files];
        $pathArray = [];
        foreach ($files as $file) {
            $path = Storage::putFile('/public' . $folder, $file);
            array_push($pathArray, Storage::url($path));
        }
        return $pathArray;
    }
    // static function deleteStorageFolder($path)
    // {
    //     dd($path);
    //     File::deleteDirectory(public_path($path));
    // }
}
