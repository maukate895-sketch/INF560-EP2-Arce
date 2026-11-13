<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        $servicios = [
            'Transporte',
            'Almuerzo',
            'Entradas incluidas',
            'Guía bilingüe',
            'Seguro',
            'Equipo de protección',
        ];

        foreach ($servicios as $nombre) {
            Servicio::firstOrCreate([
                'nombre' => $nombre,
            ]);
        }
    }
}