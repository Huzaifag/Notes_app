<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;

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


Route::redirect("/" , "/note")->name("dashboard");
Route::middleware(["auth","verified"])->group(function () {
  Route::get('/', [UserController::class, 'welcome'])->name('welcome');
// Route::get('/note', [NotesController::class, 'index'])->name('note.index');
// Route::get('/note/create', [NotesController::class, 'store'])->name('note.store');
// Route::post('/note', [NotesController::class, 'create'])->name('note.create');
// Route::get('/note/{id}', [NotesController::class, 'show'])->name('note.show');
// Route::get('/note/{id}/edit', [NotesController::class, 'edit'])->name('note.edit');
// Route::put('/note/{id}', [NotesController::class, 'update'])->name('note.update');
// Route::delete('/note/{id}', [NotesController::class, 'destroy'])->name('note.destroy');

Route::resource('note', NotesController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// composer require laravel/breeze --dev
// php artisan breeze:install