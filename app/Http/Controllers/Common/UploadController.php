<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function make(Request $request, UploadService $uploadService)
    {
        return $uploadService->upload($request->file);
    }

}
