<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JalanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\UserController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::resource('/akun', UserController::class)->parameters([
        'akun' => 'user'
    ]);

    Route::resource('/jalan', JalanController::class);
    Route::resource('/kriteria', KriteriaController::class)->parameters([
        'kriteria' => 'kriteria'
    ]);
    Route::resource('/penilaian', PenilaianController::class)->parameters([
        'penilaian' => 'jalan'
    ]);
    Route::resource('/rencana', RencanaController::class);
});
