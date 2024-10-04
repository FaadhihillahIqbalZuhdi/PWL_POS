<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);

// Route::get('/user/tambah', [UserController::class,'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class,'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class,'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class,'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class,'hapus']);

// Jobsheet 5
Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix'=> 'user'], function () {
    Route::get('/', [UserController::class,'index']);           //menampilkan halaman awal user
    Route::post('/list', [UserController::class,'list']);       //menampilkan data user dalam bentuk json untuk data tables
    Route::get('/create', [UserController::class,'create']);    //menampilkan halaman form tambah user
    Route::post('/', [UserController::class,'store']);          //menyimpan data user baru
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);   // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']);   // Menyimpan data user baru Ajax
    Route::get('/{id}', [UserController::class,'show']);        //menampilkan detail user
    Route::get('/{id}/edit', [UserController::class,'edit']);   //menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class,'update']);      //menyimpan perubahan data user
    Route::get('/{id}/edit_ajax', [UserController::class,'edit_ajax']);   //menampilkan halaman form edit user ajax
    Route::put('/{id}/delete_ajax', [UserController::class,'confirm_ajax']);   // untuk tampilkan form confirm delete user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class,'delete_ajax']);   // untuk hapus data user ajax
    Route::delete('/{id}', [UserController::class,'destroy']);  //menghapus data user
});



