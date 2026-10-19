<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Abarrotes',
                'descripcion' => 'Productos básicos para el hogar.',
            ],
            [
                'nombre' => 'Bebidas',
                'descripcion' => 'Refrescos, agua y bebidas en general.',
            ],
            [
                'nombre' => 'Botanas',
                'descripcion' => 'Botanas dulces y saladas.',
            ],
            [
                'nombre' => 'Lácteos',
                'descripcion' => 'Leche, queso, yogurt y derivados.',
            ],
            [
                'nombre' => 'Limpieza',
                'descripcion' => 'Productos para la limpieza del hogar.',
            ],

            [
                'nombre' => 'Alcohol',
                'descripcion' => 'Bebidas alcohólicas como cerveza, vino y licores.',
            ]
        ];


        foreach ($categorias as $categoria) {
            Categoria::query()->updateOrCreate(
                ['nombre' => $categoria['nombre']],
                ['descripcion' => $categoria['descripcion']],
            );
        }
    }
}
