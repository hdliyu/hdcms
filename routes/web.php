<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    dd(auth()->user()->name);
    return '首页';
});

Route::group(['namespace'=>'Account','middleware'=>'guest'],function(){
    Route::resource('login','LoginController')->only(['index','store']);
    Route::resource('register','RegisterController')->only(['index','store']);
});
