<?php

namespace App\Policies;

use App\Models\Producto;
use app\Models\Usuario;

class ProductoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    /**
     * Cualquier usuario autenticado y activo puede consultar el catálogo.
     */
    public function viewAny(Usuario $usuario): bool
    {
        return (bool) $usuario->activo;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Usuario $usuario, Producto $producto): bool
    {
        return (bool) $usuario->activo;
    }

    /**
     * Determine whether the user can create models.
     */
    /**
     * Solo el correo especificado puede crear productos.
     */
    public function create(Usuario $usuario): bool
    {
        return $usuario->email === 'admin@donchuy.test';
    }

    /**
     * Determine whether the user can update the model.
     */
    /**
     * Solo el correo especificado puede modificar productos.
     */
    public function update(Usuario $usuario, Producto $producto): bool
    {
        return $usuario->email === 'admin@donchuy.test';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Usuario $usuario, Producto $producto): bool
    {
        return $usuario->email === 'admin@donchuy.test';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Usuario $usuario, Producto $producto): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Usuario $usuario, Producto $producto): bool
    {
        return false;
    }
}
