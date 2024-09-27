<?php
// app/Services/ImageUploadService.php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    /**
     * Upload an image to the specified storage disk and folder.
     *
     * @param UploadedFile $file  The file to be uploaded.
     * @param string $folder       The folder where the file should be stored.
     * @param string|null $disk    The storage disk (optional, defaults to 'public').
     * @return string|false        The file path of the uploaded file or false if upload fails.
     */
    public function upload(UploadedFile $file, string $folder, string $disk = 'public')
    {
        // Store the file using the store method and return the path
        return $file->store($folder, $disk);
    }
}
