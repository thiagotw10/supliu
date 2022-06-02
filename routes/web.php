<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FaixasController;
use App\Http\Controllers\LoginfrontController;

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
Route::get('/', [FaixasController::class, 'album']);

Route::get('/login', [LoginfrontController::class, 'index']);

Route::get('/login/validation', [LoginController::class, 'login'])->name('login');

Route::middleware('login')->group(function () {
    
    Route::get('/album', [AlbumController::class, 'album'])->name('album');
    Route::get('/album-form', [AlbumController::class, 'albumForm'])->name('albumForm');
    Route::post('/album-form', [AlbumController::class, 'albumDados'])->name('cadastro.add');
    Route::get('/album/edit/{id}', [AlbumController::class, 'albumEdit'])->name('album.edit');
    Route::get('/album/delete/{id}', [AlbumController::class, 'albumDelete'])->name('album.delete');
    Route::get('/album/delete/faixa/{id}', [AlbumController::class, 'faixaDelete'])->name('faixa.delete');
    Route::post('/album/update/{id}', [AlbumController::class, 'albumUpdate'])->name('faixa.delete');

    Route::get('sair', [LoginController::class, 'sair'])->name('sair');
});
