<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\CitadController;
use App\Http\Controllers\CitaeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::put('/dashboard/{user}/update', [DashboardController::class, 'update'])->name('dashboard.update');


    Route::get('/cita', [CitaController::class, 'index'])->name('cita.index');
    Route::post('/cita', [CitaController::class, 'store'])->name('cita.store');
    Route::post('/citas', [CitaController::class, 'create'])->name('cita.create');
    Route::delete('/cita/{id}', [CitaController::class, 'destroy'])->name('cita.destroy');
    

    Route::get('/citad', [CitadController::class, 'index'])->name('citad.index');
    Route::post('/citad', [CitadController::class, 'store'])->name('citad.store');
    Route::post('/citads', [CitadController::class, 'create'])->name('citad.create');
    Route::delete('/citad/{id}', [CitadController::class, 'destroy'])->name('citad.destroy');

    Route::get('/citae', [CitaeController::class, 'index'])->name('citae.index');
    Route::post('/citae', [CitaeController::class, 'store'])->name('citae.store');
    Route::post('/citaes', [CitaeController::class, 'create'])->name('citae.create');
    Route::delete('/citae/{id}', [CitaeController::class, 'destroy'])->name('citae.destroy');

    Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::put('/usuario/{user}/update', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::post('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');

    Route::get('/servicio', [ServicioController::class, 'index'])->name('servicio.index');
    Route::post('/servicio', [ServicioController::class, 'store'])->name('servicio.store');
    Route::put('/servicio/{id}/update', [ServicioController::class, 'update'])->name('servicio.update');
    Route::delete('/servicio/{id}', [ServicioController::class, 'destroy'])->name('servicio.destroy');


});


// Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
