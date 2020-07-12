<?php

use App\Http\Controllers\Common\VerificationCodeController;
use App\Notifications\VerificationCodeNotification;
use App\Services\CodeService;
use App\User;
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
    Route::get('logout','LoginController@logout')->name('logout');
});

Route::group(['namespace'=>'Account','middleware'=>'guest'],function(){
    Route::resource('login','LoginController')->only(['index','store'])->names([
        'index'=>'login'
    ]);
    Route::resource('register','RegisterController')->only(['index','store'])->names([
        'index'=>'register'
    ]);
    Route::post('register/code','RegisterController@code')->middleware(['throttle:1,1']);
});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'auth','as'=>'admin.'],function (){
    Route::get('/','HomeController@index')->name('index');
    Route::get('system', 'HomeController@setting')->name('setting');

    Route::get('module','ModuleController@index')->name('module.index');
    Route::get('module/install/{name}','ModuleController@install')->name('module.install');
    Route::delete('module/uninstall/{module:name}','ModuleController@uninstall')->name('module.uninstall');
});
