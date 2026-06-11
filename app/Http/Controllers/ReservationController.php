<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Notifications\ReservationStatusNotification;
use App\Mail\ReservationStatusMail;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function adminIndex()
    {
        $reservations = Reservation::latest()->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    use App\Mail\ReservationStatusMail;
    use Illuminate\Support\Facades\Mail;
    
    public function accepter(Reservation $reservation)
    {
        $reservation->update([
            'statut' => 'accepte'
        ]);
    
        Mail::to($reservation->email)
            ->send(new ReservationStatusMail($reservation));
    
        return back()->with('success', 'Réservation acceptée + email envoyé');
    }

    public function refuser(Reservation $reservation)
    {
        $reservation->update([
            'statut' => 'refuse'
        ]);

        Mail::to($reservation->email)
            ->send(new ReservationStatusMail($reservation));

        return back()->with('success', 'Réservation refusée + email envoyé');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'date_rdv' => 'required|date',
            'heure_rdv' => 'required',
            'motif' => 'required|string',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'date_rdv' => $request->date_rdv,
            'heure_rdv' => $request->heure_rdv,
            'motif' => $request->motif,
            'statut' => 'en_attente',
        ]);

        return redirect()
            ->route('reservations.index')
            ->with('success', 'Réservation enregistrée avec succès.');
    }
}