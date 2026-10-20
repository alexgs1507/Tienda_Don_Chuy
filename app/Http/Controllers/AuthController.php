<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($datos)) {
            return response()->json([
                'mensaje' => 'Credenciales inválidas',
            ], 401);
        }

        if (! $request->user()->activo) {
            Auth::logout();

            return response()->json([
                'mensaje' => 'Credenciales inválidas',
            ], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'mensaje' => 'Sesión iniciada',
            'usuario' => $request->user()->only(
                'id',
                'nombre',
                'email'
            ),
        ], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'mensaje' => 'Sesión cerrada',
        ], 200);
    }
}
