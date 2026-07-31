<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {

        return view('admin.dashboard', [

            'totalReservations' => Reservation::count(),

            'acceptedReservations' =>
                Reservation::where('statut','accepte')->count(),

            'pendingReservations' =>
                Reservation::where('statut','en_attente')->count(),

        ]);

    }

}

