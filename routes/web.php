<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::middleware(IsAdminMiddleware::class)->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
    });
        
    Route::get('/home/{category_id?}', [HomeController::class, 'index'])->name('home');
    Route::get('/post/{post}', [HomeController::class, 'show'])->name('post.show');

    Route::view('/contact', 'contact')->name('contact');
    Route::view('/about', 'about')->name('about');
});



// Route::abort();
require __DIR__ . '/auth.php';
