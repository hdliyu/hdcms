<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{
    public function send(Request $request)
    {
        return view('code');
    }
}

