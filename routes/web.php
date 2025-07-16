<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CuoteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserTeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SecretariaController;
use Illuminate\Support\Facades\Auth;

// Página principal
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas de autenticación
Auth::routes();

// Ruta común post-login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');

// Panel para ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Panel para SECRETARIA
Route::middleware(['auth', 'role:secretaria'])->group(function () {
    Route::get('/secretaria', [SecretariaController::class, 'index'])->name('secretaria.dashboard');
});

// Rutas de roles (Spatie compatible, sin bindings automáticos)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('roles', RolController::class); // No cambiar parámetros, usar modelo Spatie
});

// Usuarios y gestión de usuarios (admin y secretaria)
Route::middleware(['auth', 'role:admin|secretaria'])->group(function () {
    Route::resource('users', UserController::class);
    // Puedes agregar aquí rutas adicionales para usuarios pendientes si las necesitas.
});
