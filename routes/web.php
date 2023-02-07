<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\AkunController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// ANGGOTA
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/admin/data/anggota', [AnggotaController::class, 'index'])->middleware('auth');
Route::get('/admin/data/info/{anggota_id}', [AnggotaController::class, 'show'])->middleware('auth');
Route::get('/admin/data/edit/{anggota_id}', [AnggotaController::class, 'edit'])->middleware('auth');
Route::post('/admin/data/update', [AnggotaController::class, 'update'])->middleware('auth');
Route::get('/admin/data/delete/{anggota_id}', [AnggotaController::class, 'destroy'])->middleware('auth');
Route::get('/admin/data/tambah', [AnggotaController::class, 'formCreate'])->middleware('auth');
Route::post('/admin/data/create', [AnggotaController::class, 'create'])->middleware('auth');
Route::post('/admin/anggota/search', [AnggotaController::class, 'getData'])->middleware('auth');


// PINJAMAN
Route::get('/admin/data/pinjaman', [PinjamanController::class,'index'])->middleware('auth');
Route::get('/admin/transaksi/tambah-pinjaman', [PinjamanController::class, 'tambah'])->middleware('auth');
Route::get('/admin/transaksi/pinjaman', [PinjamanController::class, 'index'])->middleware('auth');
Route::post('/admin/transaksi/tambah-data-pinjaman', [PinjamanController::class, 'create'])->middleware('auth');
Route::get('/admin/pinjaman/invoice', [PinjamanController::class, 'invoice'])->middleware('auth');


// ANGSURAN
Route::get('/admin/data/angsuran', [AngsuranController::class, 'list'])->middleware('auth');
Route::get('/admin/transaksi/angsuran', [AngsuranController::class, 'index'])->middleware('auth');
Route::post('/admin/transaksi/tambah-data-angsuran', [AngsuranController::class, 'create'])->middleware('auth');
Route::get('/admin/data/bayar-angsuran/{kode_pinjaman}', [AngsuranController::class, 'show'])->middleware('auth');
Route::post('/admin/transaksi/search', [AngsuranController::class, 'getData'])->middleware('auth');


// SIMPANAN
Route::get('/admin/data/simpanan', [SimpananController::class, 'record'])->middleware('auth');
Route::get('/admin/transaksi/simpanan', [SimpananController::class, 'index'])->middleware('auth');
Route::post('/admin/transaksi/tambah-data-simpanan', [SimpananController::class, 'create'])->middleware('auth');




Route::get('/dashboard', [DashboardController::class, 'index_user'])->middleware('auth');
Route::get('/pinjaman', [PinjamanController::class, 'index_user'])->middleware('auth');
Route::get('/simpanan', [SimpananController::class, 'index_user'])->middleware('auth');
Route::get('/angsuran', [AngsuranController::class, 'index_user'])->middleware('auth');
Route::get('/akun', [AkunController::class, 'index'])->name('tampil')->middleware('auth');
Route::get('/akun/edit/{anggota_id}', [AkunController::class, 'ubah'])->name('ubah')->middleware('auth');
Route::post('/update', [AkunController::class, 'update'])->name('update')->middleware('auth');


