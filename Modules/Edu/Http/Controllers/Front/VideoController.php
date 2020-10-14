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
        $dynamics = Study::where('site_id',site()['id'])->latest()->take(10)->get();
        $videos = Video::latest('updated_at')->paginate();
        return view('edu::video.index',compact('videos','dynamics'));
    }

    public function show(Video $video)
    {
        $id = $video->id;
//        user()->make()->studys()->updateOrCreate(['video_id'=>5906,'user_id'=>1,'site_id'=>1]);
        user()->make()->studys()->detach([$id]);
        user()->make()->studys()->attach([$id=>['site_id'=>site()['id']]]);
        return view('edu::video.show',compact('video'));
    }

    public function edit($id)
    {
        return view('edu::edit');
    }


}
