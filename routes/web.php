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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/kelompok', function () {
    return view('pages.kelompok');
});

Route::get('/kelas', function () {
    return view('pages.kelas');
});

Route::get('/tambahkelompok', function () {
    return view('add.tambahkk');
});

Route::get('/tambahkelas', function () {
    return view('add.tambahkelas');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
