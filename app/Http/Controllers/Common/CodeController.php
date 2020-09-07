<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\CodeService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }
    public function send(Request $request, CodeService $codeService)
    {
        $request->validate([
            'account' => ['required', $this->validateAccountField(), Rule::unique('users', $this->username())],
            'captcha' => ['required', 'captcha']
        ]);

        $codeService->send($request->account);

        return response()->json(['message' => '验证码发送成功']);
    }
}
