<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeFotoController;
use App\Http\Controllers\KomentarFotoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('albums',AlbumController::class);
Route::resource('fotos',FotoController::class);
Route::resource('like-fotos',LikeFotoController::class);
Route::resource('komentar-fotos',KomentarFotoController::class);
Route::resource('users', UserController::class);

Route::put('/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');

Route::get('/fotos/{foto}/edit', [FotoController::class, 'edit'])->name('fotos.edit');
Route::put('/fotos/{foto}', [FotoController::class, 'update'])->name('fotos.update');

    

