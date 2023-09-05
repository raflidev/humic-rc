<?php

use App\Http\Controllers\HkiController;
use App\Http\Controllers\IsiTargetController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\NtfController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\TargetController;
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
Route::get('/', [TargetController::class, 'index'])->name('target.index');
Route::get('/target/input', [TargetController::class, 'index_admin'])->name('target.index_admin');
Route::get('/target/input/laporan', [TargetController::class, 'laporan'])->name('target.laporan');
Route::get('/target/input/add', [TargetController::class, 'create'])->name('target.create');
Route::post('/target/input/add', [TargetController::class, 'store'])->name('target.store');
Route::get('/target/input/edit/{id}', [TargetController::class, 'edit'])->name('target.edit');
Route::put('/target/input/edit/{id}', [TargetController::class, 'update'])->name('target.update');
Route::delete('/target/input/hapus/{id}', [TargetController::class, 'destroy'])->name('target.destroy');

Route::get('/target/{id}/add', [IsiTargetController::class, 'index'])->name('isitarget.index');
Route::post('/target/{id}/add', [IsiTargetController::class, 'store'])->name('isitarget.store');
Route::delete('/target/{id}/hapus/{id_delete}', [IsiTargetController::class, 'destroy'])->name('isitarget.destroy');

Route::get('/target/{id}/pic', [PicController::class, 'index'])->name('pic.index');
Route::post('/target/{id}/pic', [PicController::class, 'store'])->name('pic.store');
Route::delete('/target/{id}/pic/hapus/{id_delete}', [PicController::class, 'destroy'])->name('pic.destroy');

Route::get('/penelitian', [ResearchController::class, 'index'])->name('research.index');
Route::get('/penelitian/input', [ResearchController::class, 'create_index'])->name('research.create_index')->middleware('auth');
// add
Route::get('/penelitian/input/add', [ResearchController::class, 'create'])->name('research.create')->middleware('auth');
Route::post('/penelitian/input/add', [ResearchController::class, 'store'])->name('research.store')->middleware('auth');
// member
Route::get('/penelitian/input/member/{id}', [ResearchController::class, 'member'])->name('research.member')->middleware('auth');
Route::post('/penelitian/input/member/{id}', [ResearchController::class, 'member_store'])->name('research.member_store')->middleware('auth');
Route::delete('/penelitian/input/member/{id}', [ResearchController::class, 'member_destroy'])->name('research.member_destroy')->middleware('auth');
// member
Route::get('/penelitian/input/mitra/{id}', [ResearchController::class, 'mitra'])->name('research.mitra')->middleware('auth');
Route::post('/penelitian/input/mitra/{id}', [ResearchController::class, 'mitra_store'])->name('research.mitra_store')->middleware('auth');
Route::delete('/penelitian/input/mitra/{id}', [ResearchController::class, 'mitra_destroy'])->name('research.mitra_destroy')->middleware('auth');
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
Route::get('/admin/input/add', [UserController::class, 'create_admin'])->name('user.create_admin')->middleware('auth', 'superadmin');
Route::get('/admin/input/edit/{id}', [UserController::class, 'edit_admin'])->name('user.edit_admin')->middleware('auth', 'superadmin');

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
Route::get('/kerjasama/data/moa', [KerjasamaController::class, 'data_moa'])->name('kerjasama.data_moa');
Route::get('/kerjasama/moa/add', [KerjasamaController::class, 'create_moa'])->name('kerjasama.create_moa')->middleware('auth');
Route::get('/kerjasama/moa/edit/{id}', [KerjasamaController::class, 'edit_moa'])->name('kerjasama.edit_moa')->middleware('auth');
Route::put('/kerjasama/moa/edit/{id}', [KerjasamaController::class, 'update_moa'])->name('kerjasama.update_moa')->middleware('auth');
Route::post('/kerjasama/moa/add', [KerjasamaController::class, 'store_moa'])->name('kerjasama.store_moa')->middleware('auth');
Route::delete('/kerjasama/moa/hapus/{id}', [KerjasamaController::class, 'destroy_moa'])->name('kerjasama.destroy_moa')->middleware('auth');
Route::put('/kerjasama/moa/verifikasi/{id}', [KerjasamaController::class, 'verifikasi_moa'])->name('kerjasama.verifikasi_moa')->middleware('auth', 'superadmin');
//excel
Route::get('/kerjasama/moa/import', [KerjasamaController::class, 'excel_import_moa'])->name('kerjasama.excel_import_moa')->middleware('auth');
Route::post('/kerjasama/moa/import', [KerjasamaController::class, 'excel_import_moa_post'])->name('kerjasama.excel_import_moa_post')->middleware('auth');

// MOU
Route::get('/kerjasama/mou', [KerjasamaController::class, 'index_mou'])->name('kerjasama.mou')->middleware('auth');
Route::get('/kerjasama/data/mou', [KerjasamaController::class, 'data_mou'])->name('kerjasama.data_mou');
Route::get('/kerjasama/mou/add', [KerjasamaController::class, 'create_mou'])->name('kerjasama.create_mou')->middleware('auth');
Route::get('/kerjasama/mou/edit/{id}', [KerjasamaController::class, 'edit_mou'])->name('kerjasama.edit_mou')->middleware('auth');
Route::put('/kerjasama/mou/edit/{id}', [KerjasamaController::class, 'update_mou'])->name('kerjasama.update_mou')->middleware('auth');
Route::post('/kerjasama/mou/add', [KerjasamaController::class, 'store_mou'])->name('kerjasama.store_mou')->middleware('auth');
Route::delete('/kerjasama/mou/hapus/{id}', [KerjasamaController::class, 'destroy_mou'])->name('kerjasama.destroy_mou')->middleware('auth');
Route::put('/kerjasama/mou/verifikasi/{id}', [KerjasamaController::class, 'verifikasi_mou'])->name('kerjasama.verifikasi_mou')->middleware('auth', 'superadmin');

//excel
Route::get('/kerjasama/mou/import', [KerjasamaController::class, 'excel_import_mou'])->name('kerjasama.excel_import_mou')->middleware('auth');
Route::post('/kerjasama/mou/import', [KerjasamaController::class, 'excel_import_mou_post'])->name('kerjasama.excel_import_mou_post')->middleware('auth');


Route::get('/kerjasama/ai', [KerjasamaController::class, 'index_ai'])->name('kerjasama.ai')->middleware('auth');
Route::get('/kerjasama/data/ai', [KerjasamaController::class, 'data_ai'])->name('kerjasama.data_ai');
Route::get('/kerjasama/ai/add', [KerjasamaController::class, 'create_ai'])->name('kerjasama.create_ai')->middleware('auth');
Route::get('/kerjasama/ai/edit/{id}', [KerjasamaController::class, 'edit_ai'])->name('kerjasama.edit_ai')->middleware('auth');
Route::put('/kerjasama/ai/edit/{id}', [KerjasamaController::class, 'update_ai'])->name('kerjasama.update_ai')->middleware('auth');
Route::post('/kerjasama/ai/add', [KerjasamaController::class, 'store_ai'])->name('kerjasama.store_ai')->middleware('auth');
Route::delete('/kerjasama/ai/hapus/{id}', [KerjasamaController::class, 'destroy_ai'])->name('kerjasama.destroy_ai')->middleware('auth');
Route::put('/kerjasama/ai/verifikasi/{id}', [KerjasamaController::class, 'verifikasi_ai'])->name('kerjasama.verifikasi_ai')->middleware('auth', 'superadmin');

// excel
Route::get('/kerjasama/ai/import', [KerjasamaController::class, 'excel_import_ai'])->name('kerjasama.excel_import_ai')->middleware('auth');
Route::post('/kerjasama/ai/import', [KerjasamaController::class, 'excel_import_ai_post'])->name('kerjasama.excel_import_ai_post')->middleware('auth');


// NTF
Route::get('/ntf', [NtfController::class, 'show'])->name('ntf');
Route::get('/ntf/input', [NtfController::class, 'index'])->name('ntf.index')->middleware('auth', 'superadmin');
Route::get('/ntf/input/add', [NtfController::class, 'create'])->name('ntf.create')->middleware('auth', 'superadmin');
Route::post('/ntf/input/add', [NtfController::class, 'store'])->name('ntf.store')->middleware('auth', 'superadmin');
Route::get('/ntf/edit/{id}', [NtfController::class, 'edit'])->name('ntf.edit')->middleware('auth', 'superadmin');
Route::put('/ntf/edit/{id}', [NtfController::class, 'update'])->name('ntf.update')->middleware('auth', 'superadmin');
Route::delete('/ntf/hapus/{id}', [NtfController::class, 'destroy'])->name('ntf.destroy')->middleware('auth', 'superadmin');


// Publikasi
Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/input', [PublikasiController::class, 'create_index'])->name('publikasi.create_index')->middleware('auth');
Route::get('/publikasi/input/add', [PublikasiController::class, 'create'])->name('publikasi.create')->middleware('auth');
Route::post('/publikasi/input/add', [PublikasiController::class, 'store'])->name('publikasi.store')->middleware('auth');
Route::get('/publikasi/input/edit/{id}', [PublikasiController::class, 'edit'])->name('publikasi.edit')->middleware('auth');
Route::put('/publikasi/input/edit/{id}', [PublikasiController::class, 'update'])->name('publikasi.update')->middleware('auth');
Route::put('/publikasi/input/verifikasi/{id}', [PublikasiController::class, 'verifikasi'])->name('publikasi.verifikasi')->middleware('auth');
Route::delete('/publikasi/input/hapus/{id}', [PublikasiController::class, 'destroy'])->name('publikasi.destroy')->middleware('auth');
// member
Route::get('/publikasi/input/member/{id}', [PublikasiController::class, 'member'])->name('publikasi.member')->middleware('auth');
Route::post('/publikasi/input/member/{id}', [PublikasiController::class, 'member_store'])->name('publikasi.member_store')->middleware('auth');
Route::delete('/publikasi/input/member/{id}', [PublikasiController::class, 'member_destroy'])->name('publikasi.member_destroy')->middleware('auth');

// excel
Route::get('/publikasi/input/import', [PublikasiController::class, 'excel_import'])->name('publikasi.excel_import')->middleware('auth');
Route::post('/publikasi/input/import', [PublikasiController::class, 'excel_import_post'])->name('publikasi.excel_import_post')->middleware('auth');


// HKI
Route::get('/hki', [HkiController::class, 'index'])->name('hki.index');
Route::get('/hki/input', [HkiController::class, 'create_index'])->name('hki.create_index')->middleware('auth');
Route::get('/hki/input/add', [HkiController::class, 'create'])->name('hki.create')->middleware('auth');
Route::post('/hki/input/add', [HkiController::class, 'store'])->name('hki.store')->middleware('auth');
Route::get('/hki/input/edit/{id}', [HkiController::class, 'edit'])->name('hki.edit')->middleware('auth');
Route::put('/hki/input/edit/{id}', [HkiController::class, 'update'])->name('hki.update')->middleware('auth');
Route::put('/hki/input/verifikasi/{id}', [HkiController::class, 'verifikasi'])->name('hki.verifikasi')->middleware('auth');
Route::delete('/hki/input/hapus/{id}', [HkiController::class, 'destroy'])->name('hki.destroy')->middleware('auth');
// excel
Route::get('/hki/input/import', [HkiController::class, 'excel_import'])->name('hki.excel_import')->middleware('auth');
Route::post('/hki/input/import', [HkiController::class, 'excel_import_post'])->name('hki.excel_import_post')->middleware('auth');


Route::get('/login', [UserController::class, 'login_index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.action');

Route::get('/register', [UserController::class, 'register_index'])->name('register');;
Route::post('/register', [UserController::class, 'register'])->name('register.action');

// Profile
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::put('/user/profile/{id}', [UserController::class, 'profile_post'])->name('user.profile_post')->middleware('auth');
