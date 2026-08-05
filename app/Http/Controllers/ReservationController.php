<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Notifications\ReservationStatusNotification;
use App\Mail\ReservationStatusMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Disponibilite;

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
        $disponibilites = Disponibilite::where('disponible', true)
            ->orderBy('heure')
            ->get();
    
        return view('reservations.create', compact('disponibilites'));
    }

    public function adminIndex()
    {
        $search = request('search');


        $reservations = Reservation::when($search, function ($query) use ($search) {

                $query->where('nom', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            })
            ->latest()
            ->get();



        $totalReservations = Reservation::count();


        $accepte = Reservation::where('statut', 'accepte')
                        ->count();


        $attente = Reservation::where('statut', 'en_attente')
                        ->count();


        $users = \App\Models\User::count();



        return view('admin.reservations.index', compact(
            'reservations',
            'totalReservations',
            'accepte',
            'attente',
            'users'
        ));
    }
    
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

            $exists = Reservation::where('date_rdv', $request->date_rdv)
            ->where('heure_rdv', $request->heure_rdv)
            ->where('statut', '!=', 'refuse')
            ->exists();
        
        if ($exists) {
            return back()
                ->withInput()
                ->withErrors([
                    'heure_rdv' => 'Ce créneau est déjà réservé.'
                ]);
        }
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