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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//     return view('home.beranda');
// });

Route::group(['middleware'=> ['auth']], function() {
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/dashboard', function () {
            return view('pages.dashboard');
        });
        Route::get('/', 'HomeController@index')->name('admin');
        Route::resource('/kelompok', 'KelompokController');
        Route::resource('/kelas', 'RoomController');
    });
});


Auth::routes();
Route::resource('/', 'UserController');

// Route::get('/home', 'HomeController@index')->name('home');


