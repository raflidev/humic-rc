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

// CRUD PENELITIAN
Route::get('/', [ResearchController::class, 'index'])->name('dashboard.research');
Route::get('/penelitian/input', [ResearchController::class, 'create_index'])->name('research.create_index')->middleware('auth');
// add
Route::get('/penelitian/input/add', [ResearchController::class, 'create'])->name('research.create')->middleware('auth');
Route::post('/penelitian/input/add', [ResearchController::class, 'store'])->name('research.store')->middleware('auth');
// edit
Route::get('/penelitian/input/edit/{id}', [ResearchController::class, 'edit'])->name('research.edit')->middleware('auth');
Route::put('/penelitian/input/edit/{id}', [ResearchController::class, 'update'])->name('research.update')->middleware('auth');
// delete
Route::delete('/penelitian/input/hapus/{id}', [ResearchController::class, 'destroy'])->name('research.destroy')->middleware('auth');

// CRUD USER
Route::get('/user/input', [UserController::class, 'index'])->name('user.index')->middleware('auth');
// add
Route::get('/user/input/add', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/user/input/add', [UserController::class, 'store'])->name('user.store')->middleware('auth');
// edit
Route::get('/user/input/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/user/input/edit/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
// delete
Route::delete('/user/input/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

// CRUD PENGNAS
Route::get('/input_pengabdian', [PengabdianController::class, 'index']);
Route::get('/pengabdian', [PengabdianController::class, 'index']);
Route::get('/pengabdian/add', [PengabdianController::class, 'create'])->name('pengabdian.create')->middleware('auth');
Route::post('/pengabdian/add', [PengabdianController::class, 'store'])->name('pengabdian.store')->middleware('auth');


Route::get('/kerjasama', [KerjasamaController::class, 'index']);
Route::get('/kerjasama', [KerjasamaController::class, 'index']);

Route::get('/ntf', function () {
    return view('ntf');
});

Route::get('/login', [UserController::class, 'login_index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.action');

Route::get('/register', [UserController::class, 'register_index']);
Route::post('/register', [UserController::class, 'register'])->name('register.action');
