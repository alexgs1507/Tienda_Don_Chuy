<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SeguridadBasicaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Helper para garantizar que exista la categoría con ID 1 en la BD de pruebas.
     */
    private function crearCategoria()
    {
        DB::table('categorias')->insertOrIgnore([
            'id'         => 1,
            'nombre'     => 'General',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    /**
     * Test 1: Peticiones sin autenticación devuelven 401.
     */
    public function test_usuario_no_autenticado_recibe_401()
    {
        $response = $this->getJson('/api/productos');

        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthenticated.']);
    }

    /**
     * Test 2: Un empleado no puede crear productos (403 Forbidden).
     */
    public function test_empleado_no_puede_crear_producto_recibe_403()
    {
        // Se crea el usuario empleado con los campos estándar de tu BD
        $empleado = Usuario::create([
            'nombre'   => 'Empleado Tienda',
            'email'    => 'empleado@donchuy.test',
            'password' => Hash::make('password'),
        ]);

        $response = $this->actingAs($empleado)
            ->postJson('/api/productos', [
                'categoria_id'  => 1,
                'nombre'        => 'Producto No Autorizado',
                'precio'        => 100.00,
                'stock'         => 10,
                'codigo_barras' => '7500000000001',
            ]);

        $response->assertStatus(403);
    }

    /**
     * Test 3: Envío de campo prohibido (id) devuelve 422 Unprocessable Content.
     */
    public function test_rechaza_campos_prohibidos_con_422()
    {
        $admin = Usuario::create([
            'nombre'   => 'Administrador',
            'email'    => 'admin@donchuy.test',
            'password' => Hash::make('password'),
        ]);

        $response = $this->actingAs($admin)
            ->postJson('/api/productos', [
                'id'            => 999, // Campo prohibido por el validador
                'categoria_id'  => 1,
                'nombre'        => 'Producto Con ID Inyectado',
                'precio'        => 50.00,
                'stock'         => 15,
                'codigo_barras' => '7500000000002',
            ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['id']);
    }

    /**
     * Test 4: El administrador crea un producto correctamente (201 Created).
     */
    public function test_administrador_crea_producto_exitosamente_201()
    {
        $this->crearCategoria();

        $admin = Usuario::create([
            'nombre'   => 'Administrador',
            'email'    => 'admin@donchuy.test',
            'password' => Hash::make('password'),
        ]);

        $response = $this->actingAs($admin)
            ->postJson('/api/productos', [
                'categoria_id'  => 1,
                'nombre'        => 'Producto Valido',
                'precio'        => 75.00,
                'stock'         => 20,
                'codigo_barras' => '7500000000003',
            ]);

        $response->assertStatus(201);
    }
}
