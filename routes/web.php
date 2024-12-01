<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\ServicoController;
// use App\Http\Controllers\GastosFixosController;
// use App\Http\Controllers\GastosVariadosController;
// use App\Http\Controllers\AgendamentoController;
// use App\Http\Controllers\DashboardController;

// Route::get('/', [AuthController::class, 'index'])->name('login.form');
// Route::post('/', [AuthController::class, 'login'])->name('login');

// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
// Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware(['auth'])->group(function () {
//     Route::resource('agendamentos', AgendamentoController::class);
// });

// Route::middleware(['auth', 'admin'])->group(function () {

//     // Rota do dashboard
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//     // Resto das rotas de recursos
//     Route::resource('servicos', ServicoController::class);
//     Route::resource('gastos_fixos', GastosFixosController::class);
//     Route::resource('gastos_variados', GastosVariadosController::class);
// });

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\GastosFixosController;
use App\Http\Controllers\GastosVariadosController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'index'])->name('login.form');
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rota para agendamentos do usuário (cliente)
Route::middleware(['auth'])->group(function () {
    Route::resource('agendamentos', AgendamentoController::class);
});

// Rota para agendamentos do administrador (dashboard)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/agendamentos_dashboard', [AgendamentoController::class, 'dashboardIndex'])->name('agendamentosDashboard.index');

    // Resto das rotas de recursos
    Route::resource('servicos', ServicoController::class);
    Route::resource('gastos_fixos', GastosFixosController::class);
    Route::resource('gastos_variados', GastosVariadosController::class);
    Route::resource('dashboard', DashboardController::class);

});
