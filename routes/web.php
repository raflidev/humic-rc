<?php

use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\ResearchController;
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

Route::get('/', [ResearchController::class, 'index']);


Route::get('/pengabdian', [PengabdianController::class, 'index']);

Route::get('/kerjasama', [KerjasamaController::class, 'index']);

Route::get('/ntf', function () {
    return view('ntf');
});

Route::get('/login', function () {
    return view('login');
});
