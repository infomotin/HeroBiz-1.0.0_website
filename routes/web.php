<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Blog routes
Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogPostController::class, 'show'])->name('blog.show');

require __DIR__.'/auth.php';