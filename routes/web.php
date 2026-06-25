<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/login'));

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('user.dashboard'))->name('dashboard');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::get('/users/{user}/print', [AdminUserController::class, 'print'])->name('users.print');
    Route::resource('users', AdminUserController::class);
});
