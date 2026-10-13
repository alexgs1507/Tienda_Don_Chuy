<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
            [
                'categoria' => 'Abarrotes',
                'nombre' => 'Arroz blanco 1 kg',
                'descripcion' => 'Arroz blanco de grano largo.',
                'precio' => 32.50,
                'stock' => 25,
                'codigo_barras' => '750100000001',
            ],
            [
                'categoria' => 'Abarrotes',
                'nombre' => 'Frijol negro 1 kg',
                'descripcion' => 'Frijol negro de primera calidad.',
                'precio' => 38.00,
                'stock' => 20,
                'codigo_barras' => '750100000002',
            ],
            [
                'categoria' => 'Bebidas',
                'nombre' => 'Agua purificada 1.5 L',
                'descripcion' => 'Agua purificada embotellada.',
                'precio' => 16.00,
                'stock' => 30,
                'codigo_barras' => '750100000003',
            ],
            [
                'categoria' => 'Botanas',
                'nombre' => 'Papas fritas 170 g',
                'descripcion' => 'Papas fritas con sal.',
                'precio' => 39.50,
                'stock' => 18,
                'codigo_barras' => '750100000004',
            ],
            [
                'categoria' => 'Lácteos',
                'nombre' => 'Leche entera 1 L',
                'descripcion' => 'Leche entera pasteurizada.',
                'precio' => 28.00,
                'stock' => 15,
                'codigo_barras' => '750100000005',
            ],
            [
                'categoria' => 'Limpieza',
                'nombre' => 'Detergente en polvo 1 kg',
                'descripcion' => 'Detergente para ropa.',
                'precio' => 42.00,
                'stock' => 12,
                'codigo_barras' => '750100000006',
            ],
        ];

        foreach ($productos as $producto) {
            $categoria = Categoria::query()
                ->where('nombre', $producto['categoria'])
                ->firstOrFail();

            Producto::query()->updateOrCreate(
                ['codigo_barras' => $producto['codigo_barras']],
                [
                    'categoria_id' => $categoria->id,
                    'nombre' => $producto['nombre'],
                    'descripcion' => $producto['descripcion'],
                    'precio' => $producto['precio'],
                    'stock' => $producto['stock'],
                    'activo' => true,
                ],
            );
        }
    }
}
