<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', function (Request $request) {
        return response()->json($request->user()->only('id', 'nombre', 'email'));
    });
    Route::apiResource('productos', ProductoController::class);
    // Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('categorias', CategoriaController::class)
        ->only(['index', 'show']);
});
