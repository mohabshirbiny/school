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


Route::prefix('dashboard')->middleware('admin')->group(function() {
    Route::resource('subjects', 'SubjectController', ['as' => 'admin']);
    Route::resource('questions', 'QuestionController', ['as' => 'admin']);
    Route::resource('lessons', 'LessonController', ['as' => 'admin']);
});