<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/course/', 'ApiCourseController@courseAll')->name('course.all');
Route::get('/course/student', 'ApiCourseController@studentAll')->name('student.all');
Route::get('/course/{courseId}', 'ApiCourseController@courseDetail')->name('course.detail');
Route::get('/course/student/{courseId}', 'ApiCourseController@studentList')->name('course.listdetail');
