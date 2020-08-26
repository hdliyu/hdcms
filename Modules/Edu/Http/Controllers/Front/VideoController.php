<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Study;
use Modules\Edu\Entities\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }

    public function index()
    {
        $videos = Video::latest('updated_at')->paginate();
        return view('edu::video.index',compact('videos'));
    }

    public function show(Video $video)
    {
        //五分钟内没有刷新写入数据库
        if(!hasStudy($video)){
            Study::create([
                'site_id'=>site()['id'],
                'user_id'=>user()->make()['id'],
                'video_id'=>$video->id,
            ]);
        }
        return view('edu::video.show',compact('video'));
    }

    public function edit($id)
    {
        return view('edu::edit');
    }


}
