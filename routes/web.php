<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\VisitaController as AdminVisitaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/login'));

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('user.dashboard'))->name('dashboard');
    Route::get('/perfil', fn () => view('user.perfil'))->name('user.perfil');
    Route::get('/avaliacao', [AvaliacaoController::class, 'index'])->name('user.avaliacao');
    Route::post('/avaliacao', [AvaliacaoController::class, 'store'])->name('user.avaliacao.store');
    Route::get('/contato', [ContatoController::class, 'index'])->name('user.contato');
    Route::post('/contato', [ContatoController::class, 'store'])->name('user.contato.store');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/users/{user}/print', [AdminUserController::class, 'print'])->name('users.print');
    Route::resource('users', AdminUserController::class);

    Route::get('/visitas/{visita}/print', [AdminVisitaController::class, 'print'])->name('visitas.print');
    Route::resource('visitas', AdminVisitaController::class);
});
