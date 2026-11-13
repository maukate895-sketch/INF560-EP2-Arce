
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Página principal
Route::get('/', function () {
    return view('inicio');
})->name('home');

// Catálogo de tours
Route::get('/tours', [TourController::class, 'index'])
    ->name('tours.index');

Route::get('/tours/{tour:slug}', [TourController::class, 'show'])
    ->name('tours.show');

// Registro e inicio de sesión
Route::middleware('guest')->group(function () {

    Route::get('/registro', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/registro', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');

});

// Funciones para usuarios autenticados
Route::middleware('auth')->group(function () {
    // Mis reservas
    Route::get('/mis-reservas', [ReservaController::class, 'index'])
        ->name('reservas.index');

    // Cancelar una reserva
    Route::patch('/mis-reservas/{reserva}/cancelar', [ReservaController::class, 'cancelar'])
        ->name('reservas.cancelar');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/tours/{tour:slug}/reservar', [ReservaController::class, 'create'])
        ->name('reservas.create');

    Route::post('/tours/{tour:slug}/reservar', [ReservaController::class, 'store'])
        ->name('reservas.store');

        // Panel exclusivo del administrador
Route::middleware(['auth', 'role:admin,web'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

});

});
