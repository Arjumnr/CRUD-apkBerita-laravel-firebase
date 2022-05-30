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

    Route::get('/tambah-berita',[BeritaController::class, 'create'])->name('tambahBerita');
    Route::post('/store',[BeritaController::class, 'strore'])->name('storeBerita');
    Route::get('/edit/{id}',[BeritaController::class, 'edit'])->name('edit');
    Route::put('/update/{id}',[BeritaController::class, 'update'])->name('update');
    Route::get('/hapus/{id}',[BeritaController::class, 'delete'])->name('delete');

    
    // Route::get('/',[BeritaController::class, 'berita'])->name('DataBerita');
    // Route::post('/update/{id}', [BeritaController::class, 'update'])->name('update');
    // Route::get('/tambah-berita',[BeritaController::class, 'create'])->name('tambahBerita');
    // Route::post('/insert',[BeritaController::class, 'insert'])->name('insert');
});

// Route::group(['prefix' => '/komentar'], function(){
//     Route::get('/', [Komentar::class, 'komentar'])->name('komentar');
//     Route::get('/jawab/{id}',[Komentar::class, 'jawab'])->name('jawab');
//     Route::get('/hapus/{id}',[Komentar::class, 'hapus'])->name('hapus');
// });

Route::group(['prefix' => '/laporan'], function(){
    Route::get('/',[LaporanController::class, 'laporan_data'])->name('laporan_data');
    Route::post('/cekBerita/{id}',[LaporanController::class, 'cekBerita'])->name('cekBerita');
});

Route::get('/',[DashboardController::class, 'index'])->name('dasdboard');
Route::get('/berita',[BeritaController::class, 'dataBerita'])->name('dataBerita');
Route::get('/laporan',[LaporanController::class, 'laporan_data'])->name('laporan_data');

