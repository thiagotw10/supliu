<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FaixasController;
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
Route::get('/', [FaixasController::class, 'album']);
Route::get('/album', [AlbumController::class, 'album'])->name('album');
Route::get('/album-form', [AlbumController::class, 'albumForm'])->name('albumForm');
Route::post('/album-form', [AlbumController::class, 'albumDados'])->name('cadastro.add');
Route::get('/album/edit/{id}', [AlbumController::class, 'albumEdit'])->name('album.edit');
