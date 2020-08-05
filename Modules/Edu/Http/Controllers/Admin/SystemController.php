<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Edu\Entities\System;
use Modules\Edu\Http\Requests\SystemLessonRequest;

class SystemController extends Controller
{
    public function __construct()
    {
         //$this->authorizeResource(System::class, 'system');
    }

    public function index()
    {
        $systems = System::all();
        return view('edu::system.index', compact('systems'));
    }

    public function create(System $system)
    {
        return view('edu::system.create', compact('system'));
    }

    public function store(SystemLessonRequest $request, System $system)
    {
        $system->fill($request->input());
        $system->site_id = site()['id'];
        $system->user_id = user('id');
        $system->save();

        $this->updateLessons($request, $system);
        return redirect()->route("edu.admin.system.index")->with('success', '课程添加成功');
    }
    protected function updateLessons(Request $request, System $system)
    {
        $lessons = explode(',', $request->input('lessons', ''));

        $system->lessons()->detach();

        foreach ($lessons as $rank => $id) {
            $system->lessons()->attach($id, ['rank' => $rank]);
        }
    }

    public function edit(System $system)
    {
        $this->authorize('edit', $system);
        return view('edu::system.edit', compact('system'));
    }

    public function update(Request $request, System $system)
    {
        $system->fill($request->input());
        $system->save();

        $this->updateLessons($request, $system);
        return redirect()->route("edu.admin.system.index")->with('success', '课程编辑成功');
    }

    public function destroy(System $system)
    {
        $system->delete();
        return response()->json(['message' => '删除成功']);
    }
}
