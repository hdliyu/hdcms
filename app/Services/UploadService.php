<?php

namespace App\Services;


use App\Models\Attachment;
use Illuminate\Http\UploadedFile;

class UploadService
{
    public function upload(UploadedFile $file)
    {
        $path = '/attachments/' . $file->store(date('y/m'), 'attachment');
        return $this->save($file, $path);
    }

    public function save(UploadedFile $file, $path)
    {
        return Attachment::create([
            'path' => $path,
            'extension' => $file->extension(),
            'name' => $file->getClientOriginalName(),
        ]);
    }
}
