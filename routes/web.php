<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitindukController;
use App\Http\Controllers\UnitPelaksanaController;
use App\Http\Controllers\UpelController;
use App\Http\Controllers\UnitLayananController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SatrkmController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\NkoController;
use App\Http\Controllers\RkmController;
use App\Http\Controllers\RekapkinerjaController;
use App\Http\Controllers\RekaprkmController;
use App\Http\Controllers\RealkpiController;
// use App\Http\Controllers\RealisasirkmController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\RkmrealisasiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('homev1');

    Route::get('home', function () {
        return view('pages.dashboardv1');
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('unitinduk', UnitindukController::class);
    Route::resource('unitpelaksana', UnitPelaksanaController::class);
    Route::resource('unitlayanan', UnitLayananController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('satrkm', SatrkmController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('aspirasi', AspirasiController::class);
    Route::resource('indikator', IndikatorController::class);
    Route::resource('nko', NkoController::class);
    Route::resource('rkm', RkmController::class);
    Route::resource('rkmrealisasi', RkmrealisasiController::class);
    Route::resource('rekapkinerja', RekapkinerjaController::class);
    Route::resource('rekaprkm', RekaprkmController::class);
    Route::resource('realkpi', RealkpiController::class);
    Route::get('/realkpi/filter', [App\Http\Controllers\RealkpiController::class, 'filter'])->name('realkpi.filter');
    Route::get('/upel', [App\Http\Controllers\UpelController::class, 'index']);
    Route::get('/upel/create', [App\Http\Controllers\UpelController::class, 'create']);
    Route::post('/upel/store', [App\Http\Controllers\UpelController::class, 'store']);
    Route::get('/upel/delupel/{id}', [App\Http\Controllers\UpelController::class, 'destroy']);
    Route::get('/upel/{id}/editupel', [App\Http\Controllers\UpelController::class, 'edit']);
    Route::post('/upel/updateupel', [App\Http\Controllers\UpelController::class, 'update']);
    // Route::resource('realrkm', RealrkmController::class);
    // Route::resource('realisasirkm', RealisasirkmController::class);
    Route::resource('rkmrealisasi', RkmrealisasiController::class);
    Route::post('/fetchlayanan', [App\Http\Controllers\UnitLayananController::class, 'fetchlayanan']);
    Route::post('/fetchpelaksana', [App\Http\Controllers\UnitLayananController::class, 'fetchpelaksana']);

    // Route::post('/filter', [App\Http\Controllers\HomeController::class, 'index']);
    // Route::get('/monitoringbulanan', [App\Http\Controllers\MonitoringController::class, 'index']);
    Route::post('/editfetchlayanan', [App\Http\Controllers\HomeController::class, 'editfetchlayanan']);
    Route::get('/performance', [App\Http\Controllers\IndikatorController::class, 'performance']);
    Route::post('/cardperformance', [App\Http\Controllers\IndikatorController::class, 'cardperformance']);
    Route::get('/realisasikpi', [App\Http\Controllers\IndikatorController::class, 'realisasikpi']);
    Route::post('/viewrealisasi', [App\Http\Controllers\IndikatorController::class, 'viewrealisasi']);
    // Route::get('/realrkm/delrealrkm/{id}', [App\Http\Controllers\RealrkmController::class, 'destroyreal']);
    // Route::get('/realrkm/{id}/editrealrkm', [App\Http\Controllers\RealrkmController::class, 'editrealrkm']);
    // Route::get('/allperformance', [App\Http\Controllers\MonitoringController::class, 'allperformance']);
});
