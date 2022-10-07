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
    return view('home');
});

Route::get('/pengabdian', function () {
    return view('pengabdian');
});

Route::get('/kerjasama', function () {
    return view('kerjasama');
});

Route::get('/ntf', function () {
    return view('ntf');
});

Route::get('/login', function () {
    return view('login');
});
