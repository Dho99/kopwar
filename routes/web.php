<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/authenticate', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);

// Pengurus
Route::middleware(['auth', 'user-access:Pengurus'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/pinjaman', [PinjamanController::class, 'index']);
    Route::get('/simpanan', [SimpananController::class, 'index']);
    Route::get('/angsuran', [AngsuranController::class, 'index']);

    Route::get('/laporanPinjaman', [PinjamanController::class, 'filter']);
    Route::get('/filterPinjaman', [PinjamanController::class, 'filtered']);
    Route::get('/laporanSimpanan', [SimpananController::class, 'filter']);
    Route::get('/filterSimpanan', [SimpananController::class, 'filtered']);
    Route::get('/laporanAngsuran', [AngsuranController::class, 'filter']);
    Route::get('/filterAngsuran', [AngsuranController::class, 'filtered']);

    Route::get('/pengurus', [AnggotaController::class, 'index']);
    Route::get('/anggota', [AnggotaController::class, 'anggotaIndex']);
    Route::get('/newAnggota', [AnggotaController::class, 'create']);
    Route::get('/newDataAnggota', [AnggotaController::class, 'createAnggota']);
    Route::post('/createAnggota', [AnggotaController::class, 'store']);
    Route::post('/createDataAnggota', [AnggotaController::class, 'storeAnggota']);
    Route::get('/deleteAnggota/{user_id}', [AnggotaController::class, 'destroy']);
    Route::get('/deleteDataAnggota/{user_id}', [AnggotaController::class, 'destroyAnggota']);

    Route::get('/categorySimpanan', [SimpananController::class, 'categoryList']);
    Route::get('/newCategory', [SimpananController::class, 'newCategory']);
    Route::get('/viewCategory', [SimpananController::class, 'viewCategory']);
    Route::post('/createCategory', [SimpananController::class, 'createCategory']);
    Route::get('/deleteCategory/{id_jenis_simpanan}', [SimpananController::class, 'destroyCategory']);

    Route::get('/pengajuan', [PengajuanController::class, 'index']);
    Route::get('/filterPengajuan', [PengajuanController::class, 'filtered']);
    Route::get('/setujuPengajuan/{id}', [PengajuanController::class, 'setuju']);
    Route::get('/tolakPengajuan/{id}', [PengajuanController::class, 'tolak']);
    Route::get('/deletePengajuan/{id_pengajuan}', [PengajuanController::class, 'destroy']);
    Route::get('/viewPengajuanSimpanan/{id_pengajuan}', [PengajuanController::class, 'showSimpanan']);
    Route::get('/deletePengajuan/{id_pengajuan}', [PengajuanController::class, 'destroy']);
    Route::get('/viewPengajuanPinjaman/{id_pengajuan}', [PengajuanController::class, 'showPinjaman']);
    Route::get('/deletePengajuan/{id_pengajuan}', [PengajuanController::class, 'destroy']);
    Route::get('/viewPengajuanAngsuran/{id_pengajuan}', [PengajuanController::class, 'showAngsuran']);
    Route::get('/aktivitas', [LogController::class, 'index']);
    Route::get('/deleteAktivitas/{id}', [LogController::class, 'destroy']);
});

// Anggota
Route::middleware(['auth', 'user-access:Anggota'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'userIndex']);
    Route::get('/user/simpanan/{user_id}', [SimpananController::class, 'userIndex']);
    Route::get('/user/simpanan/create/{user_id}', [SimpananController::class, 'userCreateSimpanan']);
    Route::get('/user/pinjaman/{user_id}', [PinjamanController::class, 'userIndex']);
    Route::get('/user/pinjaman/create/{user_id}', [PinjamanController::class, 'userCreatePinjaman']);
    Route::get('/user/angsuran/{user_id}', [AngsuranController::class, 'userIndex']);
    Route::get('/user/angsuran/create/{user_id}', [AngsuranController::class, 'userFindAngsuran']);
});

// publicLinks
Route::get('/generateUniqueCode', [PinjamanController::class, 'generate'])->middleware('auth');

// publicPinjamanLinks
Route::get('/newPinjaman', [PinjamanController::class, 'create'])->middleware('auth');
Route::post('/createPinjaman', [PinjamanController::class, 'store'])->middleware('auth');
Route::get('/deletePinjaman/{pinjam_id}', [PinjamanController::class, 'destroy'])->middleware('auth');
Route::get('/editPinjaman/{pinjam_id}', [PinjamanController::class, 'show'])->middleware('auth');
Route::post('/updatePinjaman/{pinjam_id}', [PinjamanController::class, 'update'])->middleware('auth');
Route::get('/viewPinjaman/{pinjam_id}', [PinjamanController::class, 'view'])->middleware('auth');

// publicSimpananLinks
Route::get('/newSimpanan', [SimpananController::class, 'create'])->middleware('auth');
Route::post('/createSimpanan', [SimpananController::class, 'store'])->middleware('auth');
Route::get('/editSimpanan/{id}', [SimpananController::class, 'edit'])->middleware('auth');
Route::post('/updateSimpanan/{id}', [SimpananController::class, 'update'])->middleware('auth');
Route::get('/viewSimpanan/{id}', [SimpananController::class, 'show'])->middleware('auth');
Route::get('/deleteSimpanan/{id}', [SimpananController::class, 'destroy'])->middleware('auth');

// publicAngsuranLinks
Route::get('/newAngsuran', [AngsuranController::class, 'create'])->middleware('auth');
Route::post('/findAngsuran', [AngsuranController::class, 'find'])->middleware('auth');
Route::get('/deleteAngsuran/{id}', [AngsuranController::class, 'destroy'])->middleware('auth');
Route::post('/createAngsuran', [AngsuranController::class, 'store'])->middleware('auth');
Route::get('/viewAngsuran/{id}', [AngsuranController::class, 'show'])->middleware('auth');
Route::get('/directAngsuran/{pinjam_id}', [AngsuranController::class, 'directAngsuran'])->middleware('auth');

// publicUserLinks
Route::get('/viewAnggota/{user_id}', [AnggotaController::class, 'show'])->middleware('auth');
Route::get('/viewDataAnggota/{user_id}', [AnggotaController::class, 'showAnggota'])->middleware('auth');
Route::get('/editAnggota/{user_id}', [AnggotaController::class, 'edit'])->middleware('auth');
Route::get('/editDataAnggota/{anggota_id}', [AnggotaController::class, 'editAnggota'])->middleware('auth');
Route::post('/updateAnggota/{user_id}', [AnggotaController::class, 'update'])->middleware('auth');
Route::post('/updateDataAnggota/{anggota_id}', [AnggotaController::class, 'updateAnggota'])->middleware('auth');

// publicRedirectLinks
Route::get('/backToSimpanan', [PengajuanController::class, 'afterShowSimpanan'])->middleware('auth');
Route::get('/backToPinjaman', [PengajuanController::class, 'afterShowPinjaman'])->middleware('auth');
Route::get('/backToAngsuran', [PengajuanController::class, 'afterShowAngsuran'])->middleware('auth');


// publicInvoiceLinks
Route::get('/invoice/pinjaman/{pinjam_id}', [PinjamanController::class, 'invoice'])->middleware('auth');
Route::get('/invoice/simpanan/{id}', [SimpananController::class, 'invoice'])->middleware('auth');
Route::get('/invoice/angsuran/{id}', [AngsuranController::class, 'invoice'])->middleware('auth');

;
