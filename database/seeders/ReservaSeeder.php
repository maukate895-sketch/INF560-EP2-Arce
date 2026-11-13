<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;
use App\Models\Tour;
use App\Models\User;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        $turistas = User::role('turista')->get();

        for ($i = 0; $i < 20; $i++) {

            $toursDisponibles = Tour::activos()
                ->get()
                ->filter(fn ($tour) => $tour->cupos_disponibles > 0);

            if ($toursDisponibles->isEmpty()) {
                break;
            }

            $tour = $toursDisponibles->random();
            $turista = $turistas->random();

            Reserva::factory()->create([
                'user_id' => $turista->id,
                'tour_id' => $tour->id,
                'cantidad_personas' => 1,
                'estado' => fake()->randomElement([
                    'pending',
                    'confirmed',
                    'cancelled',
                ]),
            ]);
        }
    }
}