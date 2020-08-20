<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make($model, $id)
    {
        $this->model()->favorite();
        return back();
    }

    protected function model()
    {
        $class = 'Modules\Edu\Entities\\' . request()->model;
        return app($class)->find(request()->id);
    }
}
