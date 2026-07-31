<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalReservations = Reservation::count();
    
        $pendingReservations = Reservation::where('statut', 'En attente')->count();
    
        $confirmedReservations = Reservation::where('statut', 'Confirmé')->count();
    
        return view('admin.dashboard', compact(
            'totalReservations',
            'pendingReservations',
            'confirmedReservations'
        ));
    }

}

