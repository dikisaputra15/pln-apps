<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitindukController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\RealController;
use App\Http\Controllers\MonitoringController;
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
    Route::resource('target', TargetController::class);
    Route::resource('real', RealController::class);

    Route::post('/filter', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/monitoringbulanan', [App\Http\Controllers\MonitoringController::class, 'index']);
    Route::get('/rkm', [App\Http\Controllers\MonitoringController::class, 'rkm']);
    Route::get('/allperformance', [App\Http\Controllers\MonitoringController::class, 'allperformance']);
});
