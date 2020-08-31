<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Study;
use Modules\Edu\Entities\Video;
use Modules\Edu\Entities\Traits\Study as StudyTrait;
class VideoController extends Controller
{
    use StudyTrait;
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }

    public function index()
    {
        $studys = $this->study();
        $videos = Video::latest('updated_at')->paginate();
        return view('edu::video.index',compact('videos','studys'));
    }

    public function show(Video $video)
    {
        Study::updateOrCreate([
            'site_id'=>site()['id'],
            'user_id'=>user()->make()['id'],
            'video_id'=>$video->id,
        ],[
            'updated_at'=>now(),
        ]);
        return view('edu::video.show',compact('video'));
    }

    public function edit($id)
    {
        return view('edu::edit');
    }


}
