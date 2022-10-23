<?php

use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ResearchController::class, 'index'])->name('dashboard.research');


Route::get('/pengabdian', [PengabdianController::class, 'index']);

Route::get('/kerjasama', [KerjasamaController::class, 'index']);

Route::get('/ntf', function () {
    return view('ntf');
});

Route::get('/login', [UserController::class, 'login_index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.action');
Route::get('/register', [UserController::class, 'register_index']);
Route::post('/register', [UserController::class, 'register'])->name('register.action');;
