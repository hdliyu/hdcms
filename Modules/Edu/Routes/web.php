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
// 模块前台路由
Route::group(['prefix'=>'Edu','middleware'=>['front'],'as'=>'edu.front.','namespace'=>'Front'],function(){
    Route::get('/','HomeController@index')->name('home');
    Route::resource('topic','TopicController');
    Route::resource('system','SystemController')->only(['index','show']);
    Route::resource('lesson','LessonController')->only(['index','show']);
    Route::resource('video','VideoController')->only(['index','show']);
    Route::resource('{model}/{id}/comment','CommentController')->only(['index','store','destroy']);
});


// 模块后台路由
Route::group(['prefix' => 'Edu/admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin', 'as' => 'edu.admin.'], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::resource('tag', 'TagController');
    Route::resource('lesson', 'LessonController');
    Route::resource('system', 'SystemController');
    Route::post('system-search', 'LessonController@search')->name('lesson.search');
    Route::resource('subscribe', 'SubscribeController');
});
