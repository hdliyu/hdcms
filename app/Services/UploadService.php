<?php

namespace App\Services;

use App\Models\Attachment;
use App\Models\Module as Model;
use Illuminate\Http\UploadedFile;
use OSS\OssClient;
use OSS\Core\OssException;

class UploadService
{
    public function upload(UploadedFile $file)
    {
        $method = config('site.upload.drive', 'local');
        return $this->$method($file);
    }

    public function local(UploadedFile $file)
    {
        $path = '/attachments/' . $file->store(date('y/m'), 'attachment');
        return $this->save($file, $path);
    }

    public function oss(UploadedFile $file)
    {
        $object = user('id') . '-' . date('ymdhis') . $file->getExtension();

        $ossClient = new OssClient(
            config('site.aliyun.accessKeyId'),
            config('site.aliyun.accessKeySecret'),
            config('site.aliyun.oss.endpoint')
        );

        $info = $ossClient->uploadFile(config('site.aliyun.oss.bucket'), $object, $file->path());
        return $this->save($file, $info['oss-request-url']);
    }

    protected function save(UploadedFile $file, $path)
    {
        return Attachment::create([
            'path' => $path,
            'extension' => $file->extension(),
            'name' => $file->getClientOriginalName(),
            'user_id' => user('id')
        ]);
    }
}
