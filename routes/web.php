<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/dashboard', function () {
    return view('auth.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';


Route::controller(PostController::class)->group(function () {
    Route::get('/admin/dashboard', 'dashboard')->name('auth.admin.dashboard');
    Route::get('/admin/post', 'post')->name('auth.admin.post');
    Route::get('/admin/addpost', 'create')->name('auth.admin.addpost');
    Route::put('/admin/store', 'store')->name('auth.admin.store');
    Route::get('/admin/{id}/edit', 'edit')->name('auth.admin.edit');
    Route::put('/admin/{id}/update', 'update');
    Route::delete('/admin/{id}/delete', 'delete');
    Route::get('/admin/{id}/show', 'show');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('blog');
    Route::get('/{slug}', 'show');
});