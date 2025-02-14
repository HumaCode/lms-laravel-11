<?php

namespace App;

use Illuminate\Http\UploadedFile;

trait FileUpload
{
    public function uploadFile(UploadedFile $file, $directory = 'uploads'): string
    {
        $filename = 'educore_' . uniqid() . '.' . $file->getClientOriginalExtension();


        $file->move(public_path($directory), $filename);

        return '/' . $directory . '/' . $filename;
    }
}
