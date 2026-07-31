<h2>Bonjour {{ $reservation->nom }}</h2>

<p>
Votre réservation du
<strong>{{ $reservation->date_rdv }}</strong>
à
<strong>{{ $reservation->heure_rdv }}</strong>
a été mise à jour.
</p>

@if($reservation->statut === 'accepte')
    <p style="color:green">
        ✅ Votre réservation a été acceptée.
    </p>
@else
    <p style="color:red">
        ❌ Votre réservation a été refusée.
    </p>
@endif