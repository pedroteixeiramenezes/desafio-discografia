<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesquisaFaixaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('', function () {
    return view('welcome');
});

Route::get('/inicio', [DashboardController::class, 'index'])->name('inicio');

Route::get('/pesquisa-faixa', [PesquisaFaixaController::class, 'index'])->name('pesquisa-faixa.index');

Route::prefix('/album')->group(function () {
    Route::get('', [App\Http\Controllers\AlbumController::class, 'index'])->name('album.index');
    Route::post('', [App\Http\Controllers\AlbumController::class, 'store'])->name('album.store');
    Route::get('/edit-album/{id}', [App\Http\Controllers\AlbumController::class, 'edit']);
    Route::put('/update-album/{id}', [App\Http\Controllers\AlbumController::class, 'update']);
    Route::delete('/delete-album/{id}', [App\Http\Controllers\AlbumController::class, 'destroy']);
});

Route::prefix('/faixa')->group(function () {
    Route::get('', [App\Http\Controllers\FaixaController::class, 'index'])->name('faixa.index');
    Route::post('', [App\Http\Controllers\FaixaController::class, 'store'])->name('faixa.store');
    Route::get('/edit-faixa/{id}', [App\Http\Controllers\FaixaController::class, 'edit']);
    Route::put('/update-faixa/{id}', [App\Http\Controllers\FaixaController::class, 'update']);
    Route::delete('/delete-faixa/{id}', [App\Http\Controllers\FaixaController::class, 'destroy']);
});