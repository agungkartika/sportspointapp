<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/search', [ArtikelController::class, 'search'])->name('search');
Route::get('/search/live', [ArtikelController::class, 'liveSearch']);
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/tips', [ArtikelController::class, 'indextips'])->name('artikel.tips');
Route::get('/artikel/{slug}', [ArtikelController::class, 'detailartikel'])->name('artikel.show');

