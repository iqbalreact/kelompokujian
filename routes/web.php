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
    });
});
Auth::routes();

Route::resource('/', 'UserController');

// Route::get('/home', 'HomeController@index')->name('home');


