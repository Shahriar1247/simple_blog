<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RapidController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//sites routes

Route::get('/', [PostController::class, 'home'])->name('index');

Route::get('/about', function() {
    return view('sites.about');
});

Route::get('/contact', function() {
    return view('sites.contact');
});
Route::post('/contact', [PostController::class, 'contact'])->name('contact');

//posts routes

Route::resource('posts', RapidController::class);

//blog routes
Route::get('blog/{slug}', [BlogController::class, 'getSingle']);


//categories routes
Route::resource('categories', CategoryController::class)->except(['create']);

//tags routes
Route::resource('tags', TagController::class)->except(['create']);

//Comments routes
Route::post('comments/{posts_id}', [ CommentController::class, 'store'])->name('comments.store');
Route::get('comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('comments/{id}/delete', [CommentController::class, 'delete'])->name('comments.delete');
