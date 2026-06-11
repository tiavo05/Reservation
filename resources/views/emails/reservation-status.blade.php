<h2>Bonjour {{ $reservation->nom }}</h2>

<p>
Votre réservation du <strong>{{ $reservation->date_rdv }}</strong>
à <strong>{{ $reservation->heure_rdv }}</strong>
a été :
</p>

<h3>
    {{ strtoupper($reservation->statut) }}
</h3>

<p>Merci d'utiliser notre service.</p>