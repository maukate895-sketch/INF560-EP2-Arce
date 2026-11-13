<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Histórico-cultural',
                'descripcion' => 'Recorridos por lugares históricos y culturales de Potosí.',
            ],
            [
                'nombre' => 'Minero',
                'descripcion' => 'Experiencias y visitas a centros mineros.',
            ],
            [
                'nombre' => 'Naturaleza',
                'descripcion' => 'Exploración de paisajes y atractivos naturales.',
            ],
            [
                'nombre' => 'Gastronómico',
                'descripcion' => 'Experiencias de comida y gastronomía potosina.',
            ],
            [
                'nombre' => 'Aventura',
                'descripcion' => 'Actividades de aventura y exploración.',
            ],
        ];

        foreach ($categorias as $categoria) {
            Categoria::updateOrCreate(
                ['nombre' => $categoria['nombre']],
                [
                    'slug' => Str::slug($categoria['nombre']),
                    'descripcion' => $categoria['descripcion'],
                ]
            );
        }
    }
}