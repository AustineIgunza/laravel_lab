<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddUserController;
use Illuminate\Support\Facades\Route;

// Home Page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requires login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Add User Page (GET)
Route::get('/addUser', [AddUserController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('addUser');

// Handle Add User Form Submission (POST)
Route::post('/addUser', [AddUserController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('addUser.create');

// View All Users Page
Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');


// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes (login, register, etc.)
require __DIR__.'/auth.php';

