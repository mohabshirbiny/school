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

Route::prefix('v1')->group(function(){
    Route::post('login', 'Api\AuthController@login');
    
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('user_profile', 'Api\AuthController@getUserProfile');
        Route::get('get_subjects', 'Api\AuthController@getUserSubjects');
        Route::get('get_lessons/{subject_id}', 'Api\AuthController@getSubjectLessons');
        Route::get('get_questions/{subject_id}', 'Api\AuthController@getSubjectQuestions');
        Route::post('add_result', 'Api\AuthController@addSubjectResult');
        Route::get('get_result/{subject_id}', 'Api\AuthController@getSubjectResult');
    });
});
