<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'nombre' => 'Administrador',
                'email' => 'admin@donchuy.test',
                'password' => 'password',
                'activo' => true,
            ],
            [
                'nombre' => 'Empleado de tienda',
                'email' => 'empleado@donchuy.test',
                'password' => 'password',
                'activo' => true,
            ],
            [
                'nombre' => 'Usuario inactivo',
                'email' => 'inactivo@donchuy.test',
                'password' => 'password',
                'activo' => false,
            ],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::query()->updateOrCreate(
                ['email' => $usuario['email']],
                [
                    'nombre' => $usuario['nombre'],
                    'password' => Hash::make($usuario['password']),
                    'activo' => $usuario['activo'],
                ],
            );
        }
    }
}
