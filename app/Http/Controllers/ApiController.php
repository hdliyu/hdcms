<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function success($message,$data=[],$code=200)
    {
        return response()->json([
            'message'=>$message,
            'status'=>true,
            'data'=>$data,
        ],$code);
    }

    public function error($message,$data=[],$code=419)
    {
        return response()->json([
            'message'=>$message,
            'status'=>false,
            'data'=>$data,
        ],$code);
    }
}
