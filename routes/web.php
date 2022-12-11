<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pegawai', [EmployeeController::class,'index'])->name('pegawai');
Route::get('/tambahpegawai', [EmployeeController::class,'tambahpegawai'])->name('tambahpegawai');
Route::post('/tambahdata', [EmployeeController::class,'tambahdata'])->name('tambahdata');
Route::get('/tampilkandata/{id}', [EmployeeController::class,'tampilkandata'])->name('tampilkandata');
Route::post('/perbaharuidata/{id}', [EmployeeController::class,'perbaharuidata'])->name('perbaharuidata');
Route::get('/hapus/{id}', [EmployeeController::class,'hapus'])->name('hapus');

// exportpdf
Route::get('/exportpdf', [EmployeeController::class,'exportpdf'])->name('exportpdf');
