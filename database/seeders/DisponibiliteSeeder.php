<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disponibilite;

class DisponibiliteSeeder extends Seeder
{
    public function run(): void
    {
        $heures = [
            '09:00',
            '10:00',
            '11:00',
            '14:00'
        ];


        foreach ($heures as $heure) {

            Disponibilite::create([
                'date' => '2026-08-05',
                'heure' => $heure,
                'disponible' => true
            ]);

        }
    }
}