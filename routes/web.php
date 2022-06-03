<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LaporanController;


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


Route::group(['prefix' => '/berita'], function(){
    Route::get('/',[BeritaController::class, 'dataBerita'])->name('dataBerita');
    Route::get('/tambah-berita',[BeritaController::class, 'create'])->name('tambahBerita');
    Route::post('/store',[BeritaController::class, 'strore'])->name('storeBerita');
    Route::get('/edit/{id}',[BeritaController::class, 'edit'])->name('edit');
    Route::put('/update/{id}',[BeritaController::class, 'update'])->name('update');
    Route::get('/hapus/{id}',[BeritaController::class, 'delete'])->name('delete');
});


Route::group(['prefix' => '/laporan'], function(){
    Route::get('/',[LaporanController::class, 'laporan_data'])->name('laporan_data');
    Route::put('/cekBerita/{idd}',[LaporanController::class, 'cekBerita'])->name('cekBerita');
    Route::get('/cek',[LaporanController::class, 'cek'])->name('cek');
});

Route::get('/',[DashboardController::class, 'index'])->name('dasdboard');
// Route::get('/laporan',[LaporanController::class, 'laporan_data'])->name('laporan_data');

