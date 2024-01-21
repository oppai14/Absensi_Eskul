<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Dashboard;
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
    return view('welcome');
});
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard.index');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/dataTable', [AbsensiController::class, 'dataTable']);
// Route::post('/absensi', [AbsensiController::class, 'dataTable'])->name('absensi.dataTable');

// Route::get('absensi',AbsensiController::class);