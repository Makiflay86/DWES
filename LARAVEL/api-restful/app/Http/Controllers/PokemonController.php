<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function store(Request $request) {
        $pokemon = Pokemon::create($request->all());
        return response()->json($pokemon, 201);
    }

    public function index(Request $request) {
        $query = Pokemon::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        return response()->json($query->get());
    }
    
    public function update(Request $request, $id) {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());
        return response()->json($pokemon, 200);
    }

    public function destroy($id) {
        Pokemon::destroy($id);
        return response()->json(['message' => 'Pokémon eliminado correctamente'], 200);
    }
}
