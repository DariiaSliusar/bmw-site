<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/welcome', 'welcome')->name('welcome');

Route::get('/', [PageController::class, 'landing'])->name('site.landing');

Route::get('/contacts', [PageController::class, 'contacts'])->name('site.contacts');

Route::get('/news', [PageController::class, 'posts'])->name('site.posts');



Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('dashboard/posts/list', [PostController::class, 'list'])->name('dashboard.posts.list');
Route::get('dashboard/posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');
Route::post('dashboard/posts/store', [PostController::class, 'store'])->name('dashboard.posts.store');
Route::get('dashboard/posts/edit/{id}', [PostController::class, 'edit'])->name('dashboard.posts.edit');
Route::put('dashboard/posts/update/{id}', [PostController::class, 'update'])->name('dashboard.posts.update');
Route::delete('dashboard/posts/destroy/{id}', [PostController::class, 'destroy'])->name('dashboard.posts.destroy');

