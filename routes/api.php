<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'LoginController@login');
Route::group(['middleware' => 'checkAppLogin'], function () {
//    选题
    Route::get('topics', 'TopicController@index');
    Route::get('topics/{id}', 'TopicController@show');
    Route::post('topics/select', 'TopicController@select');
//    学生
    Route::get('students/{id}', 'StudentController@show');
    Route::post('students/password', 'StudentController@editPassword');
    Route::post('students/logout', 'StudentController@logout');
//    选题记录
    Route::get('topicsRecords', 'StudentTopicLogController@index');
    Route::post('topicsRecords/reset', 'StudentTopicLogController@resetApply');
    Route::post('topicsRecords/cancel', 'StudentTopicLogController@cancel');
});


