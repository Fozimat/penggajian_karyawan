<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/gaji/findJabatanGaji/{id}', [App\Http\Controllers\Admin\GajiController::class, 'findJabatanGaji']);
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('karyawan', App\Http\Controllers\Admin\KaryawanController::class);
    Route::resource('jabatan', App\Http\Controllers\Admin\JabatanController::class);
    Route::resource('gaji', App\Http\Controllers\Admin\GajiController::class);
    Route::get('/laporan', [App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/printsemua', [App\Http\Controllers\Admin\LaporanController::class, 'print_semua'])->name('print.semua');
    Route::get('/laporan/print/karyawan', [App\Http\Controllers\Admin\LaporanController::class, 'print_karyawan'])->name('print.karyawan');
    Route::get('/gaji/print/{id}', [App\Http\Controllers\Admin\GajiController::class, 'print'])->name('print.id');
    Route::post('/laporan/printperkaryawan', [App\Http\Controllers\Admin\LaporanController::class, 'print_per_karyawan'])->name('print.per.karyawan');
    Route::post('/laporan/printperjabatan', [App\Http\Controllers\Admin\LaporanController::class, 'print_per_jabatan'])->name('print.per.jabatan');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
