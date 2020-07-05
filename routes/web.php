<?php

use App\Http\Controllers\Common\VerificationCodeController;
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
    return view('home');
})->name('home');
Route::group(['namespace'=>'Account','middleware'=>'auth'],function(){
    Route::get('logout','LoginController@logout')->name('login.logout');
});
Route::group(['namespace'=>'Account'],function(){
    Route::resource('login','LoginController')->only(['index','store']);
    Route::resource('register','RegisterController')->only(['index','store']);
});

Route::group(['namespace'=>'Common','prefix'=>'common','as'=>'common.'],function(){
    Route::post('code','VerificationCodeController@send')->name('verification.code');
});
