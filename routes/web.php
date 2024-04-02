<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitindukController;
use App\Http\Controllers\UnitPelaksanaController;
use App\Http\Controllers\UnitLayananController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MonitoringController;
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
    Route::resource('kategori', KategoriController::class);
    Route::resource('aspirasi', AspirasiController::class);
    Route::resource('indikator', IndikatorController::class);
    Route::post('/fetchlayanan', [App\Http\Controllers\UnitLayananController::class, 'fetchlayanan']);

    Route::post('/filter', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/monitoringbulanan', [App\Http\Controllers\MonitoringController::class, 'index']);
    Route::post('/editfetchlayanan', [App\Http\Controllers\HomeController::class, 'editfetchlayanan']);
    Route::get('/allperformance', [App\Http\Controllers\MonitoringController::class, 'allperformance']);
});
