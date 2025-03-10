<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//global



Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kategori', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategori/add', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/kategori/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/kategori/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/add', [PostController::class, 'add'])->name('post.add');
    Route::post('/post/add.store', [PostController::class, 'store'])->name('post.addstore');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/front.php';
