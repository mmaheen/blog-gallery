<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/details/{blog}', [SiteController::class, 'blogDetails'])->name('blog.details');
