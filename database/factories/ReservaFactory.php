<?php

namespace Database\Factories;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    public function definition(): array
    {
        $turista = User::role('turista')
            ->inRandomOrder()
            ->first();

        $tour = Tour::query()
            ->where('activo', true)
            ->whereDate('fecha_salida', '>=', now()->toDateString())
            ->inRandomOrder()
            ->first();

        return [
            'user_id' => $turista->id,
            'tour_id' => $tour->id,
            'cantidad_personas' => 1,
            'estado' => $this->faker->randomElement([
                'pending',
                'confirmed',
                'cancelled',
            ]),
            'observacion' => $this->faker->optional()->sentence(),
        ];
    }
}