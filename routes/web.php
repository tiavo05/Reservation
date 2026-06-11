<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Gestion des réservations
    Route::resource('reservations', ReservationController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/reservations', [ReservationController::class, 'adminIndex'])
        ->name('admin.reservations.index');

    Route::post('/admin/reservations/{reservation}/accepter', [ReservationController::class, 'accepter'])
        ->name('admin.reservations.accepter');

    Route::post('/admin/reservations/{reservation}/refuser', [ReservationController::class, 'refuser'])
        ->name('admin.reservations.refuser');

});
// Routes Breeze (login, register, reset password...)
require __DIR__.'/auth.php';