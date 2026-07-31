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

    Route::get('/redirect', function () {

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');

    })->middleware('auth')->name('redirect');

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
use App\Models\Reservation;


    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', function () {


            $user = auth()->user();


            $reservations = Reservation::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get();



            $totalReservations = Reservation::where('user_id', $user->id)
                ->count();



            $acceptedReservations = Reservation::where('user_id', $user->id)
                ->where('statut', 'accepte')
                ->count();



            $pendingReservations = Reservation::where('user_id', $user->id)
                ->where('statut', 'en_attente')
                ->count();



            return view('dashboard', compact(
                'reservations',
                'totalReservations',
                'acceptedReservations',
                'pendingReservations'
            ));


        })->name('dashboard');


    });

    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    
    });

require __DIR__.'/auth.php';