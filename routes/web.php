<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;


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
    
    // Route::get('/',[BeritaController::class, 'berita'])->name('DataBerita');
    // Route::get('/edit/{id}',[BeritaController::class, 'edit'])->name('edit');
    // Route::post('/update/{id}', [BeritaController::class, 'update'])->name('update');
    // Route::get('/tambah-berita',[BeritaController::class, 'create'])->name('tambahBerita');
    // Route::post('/insert',[BeritaController::class, 'insert'])->name('insert');
    // Route::get('/hapus/{id}',[BeritaController::class, 'hapus'])->name('hapus');
});

// Route::group(['prefix' => '/komentar'], function(){
//     Route::get('/', [Komentar::class, 'komentar'])->name('komentar');
//     Route::get('/jawab/{id}',[Komentar::class, 'jawab'])->name('jawab');
//     Route::get('/hapus/{id}',[Komentar::class, 'hapus'])->name('hapus');
// });

// Route::group(['prefix' => '/cekfakta'], function(){
//     Route::get('/', [ControllerFakta::class, 'index'])->name('index');
//     Route::post('/keterangan/{id}',[ControllerFakta::class, 'keterangan'])->name('keterangan');
// });

Route::get('/',[DashboardController::class, 'index'])->name('dasdboard');
Route::get('/berita',[BeritaController::class, 'dataBerita'])->name('dataBerita');

