<?php

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

Route::get('/beranda', function () {
    return view('pages.user.home');
});

Route::get('/kelas', function () {
    return view('pages.user.kelas');
});

Route::get('/pengumuman', function () {
    return view('pages.user.pengumuman');
});

Route::group(['middleware'=> ['auth']], function() {
    Route::group(['prefix'=>'admin'],function(){

        Route::get('/', 'HomeController@index')->name('admin');
        Route::resource('/kelompok', 'KelompokController');
        Route::resource('/kelas', 'GmeetController');
        Route::resource('/pengumuman', 'PengumumanController');
        
        Route::get('/getToken', 'RuanganController@getToken')->name('token');
        // course route
        Route::get('/course', 'RuanganController@index')->name('course');
        Route::get('/addcourse', 'RuanganController@addCourse')->name('course.addcourse');
        Route::get('/editcourse/{courseId}', 'RuanganController@editCourse')->name('course.editcourse');
        Route::post('/storecourse', 'RuanganController@storeCourse')->name('course.storecourse');
        Route::put('/updatecourse', 'RuanganController@updateCourse')->name('course.updatecourse');
        Route::post('/archivecourse/', 'RuanganController@archiveCourse')->name('course.archivecourse');
        
        //teacher course route
        Route::get('/course/teacher/{courseId}', 'RuanganController@teacher')->name('course.teacher-course');
        Route::post('/course/addteacher', 'RuanganController@addTeacher')->name('course.addteacher-course');
        Route::post('/deleteteacher', 'RuanganController@deleteTeacher')->name('course.deleteteacher-course');
        
        //student course route
        Route::get('/course/student/{courseId}', 'RuanganController@student')->name('course.student-course');
        Route::post('/course/addstudent', 'RuanganController@addStudent')->name('course.addstudent-course');
        Route::post('/course/student/delete', 'RuanganController@deleteStudent')->name('course.deletestudent-course');
        
        //Get Detail Course
        Route::get('/course/detail/{courseId}', 'RuanganController@courseDetail')->name('course.detail-course');
        Route::get('/course/studentlist/{courseId}', 'RuanganController@studentList')->name('course.liststudent-course');

        //active classroom
        Route::get('course/active/{courseId}', 'RuanganController@activeRoom')->name('course.active-course');
    });
});



Auth::routes();

Route::resource('/', 'UserController');

// Route::get('/home', 'HomeController@index')->name('home');


