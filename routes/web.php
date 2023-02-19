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
Route::get('/', [ResearchController::class, 'index'])->name('research.index');
Route::get('/penelitian/input', [ResearchController::class, 'create_index'])->name('research.create_index')->middleware('auth');
// add
Route::get('/penelitian/input/add', [ResearchController::class, 'create'])->name('research.create')->middleware('auth');
Route::post('/penelitian/input/add', [ResearchController::class, 'store'])->name('research.store')->middleware('auth');
// excel
Route::get('/penelitian/input/import', [ResearchController::class, 'excel_import'])->name('research.excel_import')->middleware('auth');
Route::post('/penelitian/input/import', [ResearchController::class, 'excel_import_post'])->name('research.excel_import_post')->middleware('auth');
// edit
Route::get('/penelitian/input/edit/{id}', [ResearchController::class, 'edit'])->name('research.edit')->middleware('auth');
Route::put('/penelitian/input/edit/{id}', [ResearchController::class, 'update'])->name('research.update')->middleware('auth');
Route::put('/penelitian/input/verifikasi/{id}', [ResearchController::class, 'verifikasi'])->name('research.verifikasi')->middleware('auth');
// delete
Route::delete('/penelitian/input/hapus/{id}', [ResearchController::class, 'destroy'])->name('research.destroy')->middleware('auth');

// CRUD USER
Route::get('/user/input', [UserController::class, 'index'])->name('user.index')->middleware('auth', 'superadmin');
// add
Route::get('/user/input/add', [UserController::class, 'create'])->name('user.create')->middleware('auth', 'superadmin');
Route::post('/user/input/add', [UserController::class, 'store'])->name('user.store')->middleware('auth', 'superadmin');
// edit
Route::put('/user/input/verifikasi/{id}', [UserController::class, 'verifikasi'])->name('user.verifikasi')->middleware('auth', 'superadmin');

Route::get('/user/input/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth', 'superadmin');
Route::put('/user/input/edit/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth', 'superadmin');
// delete
Route::delete('/user/input/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth', 'superadmin');
// logout
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

// CRUD ADMIN
Route::get('/admin/input', [UserController::class, 'index_admin'])->name('user.index_admin')->middleware('auth', 'superadmin');

// CRUD PENGNAS
Route::get('/pengabdian', [PengabdianController::class, 'index'])->name('pengabdian.index');
Route::get('/pengabdian/input', [PengabdianController::class, 'create_index'])->name('pengabdian.create_index')->middleware('auth');
Route::get('/pengabdian/input/add', [PengabdianController::class, 'create'])->name('pengabdian.create')->middleware('auth');
Route::post('/pengabdian/input/add', [PengabdianController::class, 'store'])->name('pengabdian.store')->middleware('auth');
Route::get('/pengabdian/input/edit/{id}', [PengabdianController::class, 'edit'])->name('pengabdian.edit')->middleware('auth');
Route::put('/pengabdian/input/edit/{id}', [PengabdianController::class, 'update'])->name('pengabdian.update')->middleware('auth');
Route::put('/pengabdian/input/verifikasi/{id}', [PengabdianController::class, 'verifikasi'])->name('pengabdian.verifikasi')->middleware('auth');
Route::delete('/pengabdian/input/hapus/{id}', [PengabdianController::class, 'destroy'])->name('pengabdian.destroy')->middleware('auth');
// excel
Route::get('/pengabdian/input/import', [PengabdianController::class, 'excel_import'])->name('pengabdian.excel_import')->middleware('auth');
Route::post('/pengabdian/input/import', [PengabdianController::class, 'excel_import_post'])->name('pengabdian.excel_import_post')->middleware('auth');

Route::get('/kerjasama', [KerjasamaController::class, 'index'])->name('kerjasama.index');
// MOA
Route::get('/kerjasama/moa', [KerjasamaController::class, 'index_moa'])->name('kerjasama.moa')->middleware('auth');
Route::get('/kerjasama/moa/add', [KerjasamaController::class, 'create_moa'])->name('kerjasama.create_moa')->middleware('auth');
Route::get('/kerjasama/moa/edit/{id}', [KerjasamaController::class, 'edit_moa'])->name('kerjasama.edit_moa')->middleware('auth');
Route::put('/kerjasama/moa/edit/{id}', [KerjasamaController::class, 'update_moa'])->name('kerjasama.update_moa')->middleware('auth');
Route::post('/kerjasama/moa/add', [KerjasamaController::class, 'store_moa'])->name('kerjasama.store_moa')->middleware('auth');
Route::delete('/kerjasama/moa/hapus/{id}', [KerjasamaController::class, 'destroy_moa'])->name('kerjasama.destroy_moa')->middleware('auth');
//excel
Route::get('/kerjasama/moa/import', [KerjasamaController::class, 'excel_import_moa'])->name('kerjasama.excel_import_moa')->middleware('auth');
Route::post('/kerjasama/moa/import', [KerjasamaController::class, 'excel_import_moa_post'])->name('kerjasama.excel_import_moa_post')->middleware('auth');

// MOU
Route::get('/kerjasama/mou', [KerjasamaController::class, 'index_mou'])->name('kerjasama.mou')->middleware('auth');
Route::get('/kerjasama/mou/add', [KerjasamaController::class, 'create_mou'])->name('kerjasama.create_mou')->middleware('auth');
Route::get('/kerjasama/mou/edit/{id}', [KerjasamaController::class, 'edit_mou'])->name('kerjasama.edit_mou')->middleware('auth');
Route::put('/kerjasama/mou/edit/{id}', [KerjasamaController::class, 'update_mou'])->name('kerjasama.update_mou')->middleware('auth');
Route::post('/kerjasama/mou/add', [KerjasamaController::class, 'store_mou'])->name('kerjasama.store_mou')->middleware('auth');
Route::delete('/kerjasama/mou/hapus/{id}', [KerjasamaController::class, 'destroy_mou'])->name('kerjasama.destroy_mou')->middleware('auth');

//excel
Route::get('/kerjasama/mou/import', [KerjasamaController::class, 'excel_import_mou'])->name('kerjasama.excel_import_mou')->middleware('auth');
Route::post('/kerjasama/mou/import', [KerjasamaController::class, 'excel_import_mou_post'])->name('kerjasama.excel_import_mou_post')->middleware('auth');


Route::get('/kerjasama/ai', [KerjasamaController::class, 'index_ai'])->name('kerjasama.ai')->middleware('auth');
Route::get('/kerjasama/ai/add', [KerjasamaController::class, 'create_ai'])->name('kerjasama.create_ai')->middleware('auth');
Route::get('/kerjasama/ai/edit/{id}', [KerjasamaController::class, 'edit_ai'])->name('kerjasama.edit_ai')->middleware('auth');
Route::put('/kerjasama/ai/edit/{id}', [KerjasamaController::class, 'update_ai'])->name('kerjasama.update_ai')->middleware('auth');
Route::post('/kerjasama/ai/add', [KerjasamaController::class, 'store_ai'])->name('kerjasama.store_ai')->middleware('auth');
Route::delete('/kerjasama/ai/hapus/{id}', [KerjasamaController::class, 'destroy_ai'])->name('kerjasama.destroy_ai')->middleware('auth');

// excel
Route::get('/kerjasama/ai/import', [KerjasamaController::class, 'excel_import_ai'])->name('kerjasama.excel_import_ai')->middleware('auth');
Route::post('/kerjasama/ai/import', [KerjasamaController::class, 'excel_import_ai_post'])->name('kerjasama.excel_import_ai_post')->middleware('auth');


Route::get('/ntf', function () {
    return view('ntf');
})->name('ntf');

Route::get('/login', [UserController::class, 'login_index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.action');

Route::get('/register', [UserController::class, 'register_index'])->name('register');;
Route::post('/register', [UserController::class, 'register'])->name('register.action');
