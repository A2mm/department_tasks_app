<?php

namespace App\Services\Upload;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class UploadService
{
    public function upload($image, $space = 'images'): string
    {
        try {
            $path = uploadSpace($space);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs($path, $imageName);
            return $imageName;
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

}
