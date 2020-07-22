<?php

namespace App\Http\Controllers;


class ApiController extends Controller
{
    public function json($data,int $code=200)
    {
        return response()->json($data,$code);
    }

    public function success($message,$data=[],int $code=200)
    {
        return response()->json([
            'message'=>$message,
            'status'=>true,
            'data'=>$data,
        ],$code);
    }

    public function error($message,$data=[],int $code=419)
    {
        return response()->json([
            'message'=>$message,
            'status'=>false,
            'data'=>$data,
        ],$code);
    }
}
