<?php
namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TourFactory extends Factory
{
    public function definition(): array
    {
        $titulos = [
            'Recorrido por el Cerro Rico',
            'Visita a la Casa de la Moneda',
            'Tour por las Lagunas de Kari Kari',
            'Ruta gastronómica potosina',
            'Aventura en el Salar de Uyuni',
            'Recorrido por el centro histórico',
            'Experiencia minera tradicional',
            'Caminata por paisajes andinos',
            'Sabores tradicionales de Potosí',
            'Aventura en montañas potosinas',
            'Ruta de iglesias coloniales',
            'Exploración de paisajes naturales',
        ];

        $titulo = $this->faker->randomElement($titulos);

        return [
            'categoria_id' => Categoria::query()->inRandomOrder()->value('id'),
            'guia_id' => User::role('guia')->inRandomOrder()->value('id'),
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'descripcion' => $this->faker->paragraph(3),
            'precio' => $this->faker->randomFloat(2, 50, 500),
            'duracion_horas' => $this->faker->numberBetween(2, 10),
            'cupo_maximo' => $this->faker->numberBetween(5, 20),
            'fecha_salida' => $this->faker->dateTimeBetween('+7 days', '+60 days')->format('Y-m-d'),
            'imagen' => null,
            'activo' => true,
        ];
    }
}