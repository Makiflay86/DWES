<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pokemons', [PokemonController::class, 'index']);           // Listar
    Route::post('/pokemons', [PokemonController::class, 'store']);          // Guardar
    Route::put('/pokemons/{id}', [PokemonController::class, 'update']);     // Actualizar
    Route::delete('/pokemons/{id}', [PokemonController::class, 'destroy']); // Eliminar
});


Route::post('/login', [AuthController::class, 'login']);