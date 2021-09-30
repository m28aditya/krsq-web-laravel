<?php

use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\Mahasiswa\HomeController as MahasiswaHome;
use App\Http\Controllers\Mahasiswa\MatkulController as MahasiswaMatkul;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MatkulController;
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

Route::get('/', [AuthController::class, 'signin'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::post('/auth/sign-out', [AuthController::class, 'logout']);


Route::middleware(['auth:user'])->group (function(){
Route::get('/mahasiswa/biodata', [MahasiswaHome::class, 'index']);
Route::post('/mahasiswa/{npm}/update', [MahasiswaHome::class, 'updateMahasiswa']); 
Route::get('/mahasiswa/matkul',[MahasiswaMatkul::class, 'index']);
Route::get('/mahasiswa/matkul/add',[MahasiswaMatkul::class, 'addMatkul']);
Route::post('/mahasiswa/matkul/add',[MahasiswaMatkul::class, 'addMatkulDetail']);
Route::post('//mahasiswa/matkul/{id}/delete', [MahasiswaMatkul::class, 'destroy']);
});

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/admin/mahasiswa/add', [MahasiswaController::class, 'addMahasiswa']);
    Route::post('/admin/mahasiswa/add', [MahasiswaController::class, 'createMahasiswa']);
    Route::get('/admin/mahasiswa/{npm}/detail', [MahasiswaController::class, 'detailMahasiswa']);
    Route::post('/admin/mahasiswa/{npm}/update', [MahasiswaController::class, 'updateMahasiswa']);
    Route::post('/delete/{npm}/mahasiswa', [MahasiswaController::class, 'destroy']);

    Route::get('/admin/matkul', [MatkulController::class, 'index']);
    Route::get('/admin/matkul/add', [MatkulController::class, 'addMatkul']);
    Route::post('/admin/matkul/add', [MatkulController::class, 'createMatkul']);
    Route::get('/admin/matkul/{kd_matkul}/detail', [MatkulController::class, 'detailMatkul']);
    Route::post('/admin/matkul/{id}/update', [MatkulController::class, 'updateMatkul']);
    Route::post('/delete/{kd_matkul}/matkul', [MatkulController::class, 'destroy']);

    Route::get('/admin/dashboard',[AdminHome::class,'index']);
    Route::get('/admin/add', [AdminHome::class,'addAdmin']);
    Route::post('/admin/add', [AdminHome::class, 'createAdmin']);
    Route::get('/admin/{username}/detail', [AdminHome::class, 'detailAdmin']);
    Route::post('/admin/{username}/update', [AdminHome::class, 'updateAdmin']);
    Route::post('/delete/{username}/admin', [AdminHome::class, 'destroy']);
});