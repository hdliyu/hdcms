<?php
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

Route::get('/admin','Site\SiteController@index')->name('admin')->middleware(['auth','admin']);

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['auth','admin'],'as'=>'admin.'],function (){
    Route::view('system', 'system.setting')->name('setting');

    Route::get('module','ModuleController@index')->name('module.index');
    Route::get('module/install/{name}','ModuleController@install')->name('module.install');
    Route::delete('module/uninstall/{module:name}','ModuleController@uninstall')->name('module.uninstall');

    Route::resource('package','PackageController');

    Route::resource('group','GroupController');

    Route::get('config','ConfigController@edit')->name('config.edit');
    Route::put('config','ConfigController@update')->name('config.update');
    Route::post('config','ConfigController@upload')->name('config.upload');

    Route::get('my','MyController@edit')->name('my.edit');
    Route::put('my','MyController@update')->name('my.update');
});

Route::group(['namespace'=>'Site','prefix'=>'site','middleware'=>['auth','admin'],'as'=>'site.'],function (){
    Route::resource('site','SiteController');
    Route::resource('{site}/admin','AdminController');
});
