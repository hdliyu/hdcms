<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\System;

class SystemController extends Controller
{

    public function index()
    {
        $systems = System::all();
        return view('edu::system_front.index',compact('systems'));
    }


    public function show(System $system)
    {
        return view('edu::system_front.show',compact('system'));
    }

    public function destroy(System $system)
    {
        $system->delete();
        return back()->with('success','系统课程删除成功');
    }
}
