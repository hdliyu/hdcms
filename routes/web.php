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

use App\User;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

Route::get('test',function(){
    $collection = collect(['name' => 'taylor', 'languages' => ['php', 'name'=>'javascript',['abc','cba',['nba','bba']]]]);

    $flattened = $collection->flatten();

    dd($flattened->all());

// ['taylor', 'php', 'javascript'];
});
Route::get('/', 'HomeController@entry')->name('home')->middleware(['front']);

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
    Route::post('{site}/admin/search','AdminController@search')->name('admin.search');
    Route::get('{site}/admin/add/{user}', 'AdminController@add')->name('admin.add');
    Route::resource('{site}/role','RoleController');
    Route::resource('{site}/admin','AdminController');
    Route::get('{site}/admin/role/{user}', 'AdminController@role')->name('admin.role');
    Route::put('{site}/admin/role/{user}', 'AdminController@updateRole')->name('admin.role.update');
    Route::get('{site}/permission/{role}','PermissionController@edit')->name('permission.edit');
    Route::put('{site}/permission/{role}','PermissionController@update')->name('permission.update');
    Route::get('{site}/module', 'ModuleController@index')->name('module.index');
    Route::get('{site}/module/{module}', 'ModuleController@entry')->name('module.entry');
});
Route::group(['prefix' => "common", 'namespace' => 'Common', 'as' => 'common.'], function () {
    Route::post('upload', 'UploadController@make')->name('upload');
});
