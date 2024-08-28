<?php

use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/welcome', 'welcome')->name('welcome');

Route::get('/', [PageController::class, 'landing'])->name('site.landing');

Route::get('/contacts', [PageController::class, 'contacts'])->name('site.contacts');

Route::get('/news', [PostController::class, 'posts'])->name('site.posts');

Route::get('/news/{id}', [PostController::class, 'show'])->name('site.post');

Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::post('contact-form', [NotificationController::class, 'contactForm'])->name('contact-form');





Auth::routes();
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');

    Route::get('posts/list', [PostController::class, 'list'])->name('dashboard.posts.list');
    Route::get('posts/create', [PostController::class, 'create'])->name('dashboard.posts.create');
    Route::post('posts/store', [PostController::class, 'store'])->name('dashboard.posts.store');
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('dashboard.posts.edit');
    Route::put('posts/update/{id}', [PostController::class, 'update'])->name('dashboard.posts.update');
    Route::get('posts/destroy/{id}', [PostController::class, 'destroy'])->name('dashboard.posts.destroy');

    Route::get('notifications', [NotificationController::class, 'list'])
        ->name('dashboard.notifications.list');
    Route::get('notifications/{id}', [NotificationController::class, 'show'])
        ->name('dashboard.notifications.show');
    Route::get('notifications/destroy/{id}', [NotificationController::class, 'destroy'])
        ->name('dashboard.notifications.destroy');
});

