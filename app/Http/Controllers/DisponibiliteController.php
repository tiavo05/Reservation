<?php

namespace App\Http\Controllers;

use App\Models\Disponibilite;

class DisponibiliteController extends Controller
{
    public function getDisponibilites($date)
    {
        // Créneaux standards disponibles chaque jour
        $horaires = [
            '09:00:00',
            '10:00:00',
            '11:00:00',
            '14:00:00',
        ];

        // Récupérer les créneaux déjà enregistrés pour cette date
        $disponibilites = Disponibilite::where('date', $date)
            ->get()
            ->keyBy('heure');

        $resultat = [];

        foreach ($horaires as $heure) {

            // Si le créneau existe déjà en base
            if ($disponibilites->has($heure)) {

                $disponibilite = $disponibilites->get($heure);

                // Seulement s'il est encore disponible
                if ($disponibilite->disponible) {
                    $resultat[] = $disponibilite;
                }

            } else {

                // Créer automatiquement le créneau
                $disponibilite = Disponibilite::create([
                    'date' => $date,
                    'heure' => $heure,
                    'disponible' => true,
                ]);

                $resultat[] = $disponibilite;
            }
        }

        return response()->json($resultat);
    }
}
