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
    Route::resource('sign','SignController')->only(['index','store','destroy']);
    Route::resource('{model}/{id}/comment','CommentController')->only(['index','store','destroy']);
    Route::get('live', 'LiveController@index')->name('live.index');
    Route::get('live/push', 'LiveController@push')->name('live.push');
    Route::any('live/notify', 'LiveController@notify')->name('live.notify');
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

Route::group(['prefix' => 'Edu/center/{user}', 'middleware' => ['front'], 'namespace' => 'Center', 'as' => 'edu.center.'], function () {
    Route::resource('topic', 'TopicController')->only('index');
});

Route::group(['prefix' => 'Edu/member', 'middleware' => ['auth', 'front'], 'namespace' => 'Member', 'as' => 'edu.member.'], function () {
    Route::resource('topic', 'TopicController')->only('index');
    Route::resource('message', 'MessageController')->only(['index', 'destroy', 'show']);
});
