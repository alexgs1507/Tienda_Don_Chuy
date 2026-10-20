<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Devuelve el catálogo paginado y permite filtrar por nombre o descripción.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Producto::class);
        $query = Producto::query();
        // Filtro opcional de búsqueda por término
        if ($buscar = $request->query('buscar')) {
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'ilike', "%{$buscar}%")
                    ->orWhere('descripcion', 'ilike', "%{$buscar}%");
            });
        }

        $porPagina = min((int) $request->query('per_page', 10), 50);

        // Paginación estándar de 10 elementos por página
        return response()->json($query->paginate($porPagina), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Crea un nuevo producto.
     */
    public function store(Request $request)
    {
        // Verifica si el usuario tiene permiso para crear productos (admini@donchuy.test)
        Gate::authorize('create', Producto::class);
        $datos = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'codigo_barras' => 'required|string|max:50|unique:productos,codigo_barras',
            'activo' => 'boolean',

            // Prohibido enviar atributos autogenerados por el sistema (retorna 422 si se envían)
            'id' => 'prohibited',
            'created_at' => 'prohibited',
            'updated_at' => 'prohibited',
        ]);
        $producto = Producto::create($datos);

        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    /**
     * Consulta el detalle de un producto específico.
     */
    public function show(Producto $producto)
    {
        Gate::authorize('view', $producto);

        return response()->json($producto, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Actualiza la información de un producto existente.
     */
    public function update(Request $request, Producto $producto)
    {
        Gate::authorize('update', $producto);
        $datos = $request->validate([
            'categoria_id' => 'sometimes|exists:categorias,id',
            'nombre' => 'sometimes|string|max:150',
            'descripcion' => 'sometimes|nullable|string',
            'precio' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'codigo_barras' => ['sometimes', 'string', 'max:50', Rule::unique('productos', 'codigo_barras')->ignore($producto->id)],
            'activo' => 'boolean',
            // Prohibidos
            'id' => 'prohibited',
            'created_at' => 'prohibited',
            'updated_at' => 'prohibited',
        ]);
        $producto->update($datos);

        return response()->json($producto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        Gate::authorize('delete', $producto);
        $producto->delete();

        return response()->json(null, 204);
    }
}
