<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\GastosFixosController;

Route::get('/', [AuthController::class, 'index'])->name('login.form');

Route::post('/', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('servicos', ServicoController::class);

Route::resource('gastos_fixos', GastosFixosController::class);
