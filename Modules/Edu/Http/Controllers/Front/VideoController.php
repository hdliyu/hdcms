<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest('updated_at')->paginate();
        return view('edu::video.index',compact('videos'));
    }

    public function show(Video $video)
    {
        return view('edu::video.show',compact('video'));
    }

    public function edit($id)
    {
        return view('edu::edit');
    }


}
