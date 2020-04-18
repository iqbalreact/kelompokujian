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
        Route::resource('/kelas', 'RoomController');
        Route::resource('/pengumuman', 'PengumumanController');
        // course route
        Route::get('/course', 'RuanganController@index')->name('course');
        Route::get('/addcourse', 'RuanganController@addCourse')->name('course.addcourse');
        Route::post('/addcourse', 'RuanganController@storeCourse')->name('course.storecourse');
        Route::post('/updatecourse', 'RuanganController@updateCourse')->name('course.updatecourse');
        Route::post('/archivecourse', 'RuanganController@archiveCourse')->name('course.archivecourse');
        //teacher course route
        Route::get('/teacher', 'RuanganController@teacher')->name('course.teacher-course');
        Route::post('/addteacher', 'RuanganController@addTeacher')->name('course.addteacher-course');
        Route::post('/deleteteacher', 'RuanganController@deleteTeacher')->name('course.deleteteacher-course');
        //student course route
        Route::get('/student', 'RuanganController@student')->name('course.student-course');
        Route::post('/addstudent', 'RuanganController@addStudent')->name('course.addstudent-course');
        Route::post('/deletestudent', 'RuanganController@deleteStudent')->name('course.deletestudent-course');
        //Get Detail Course
        Route::get('/coursedetail/{courseId}', 'RuanganController@courseDetail')->name('course.detail-course');
        Route::get('/studentlist/{courseId}', 'RuanganController@studentList')->name('course.liststudent-course');
    });
});
Auth::routes();

Route::resource('/', 'UserController');

// Route::get('/home', 'HomeController@index')->name('home');


