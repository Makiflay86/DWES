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

    public function index() {
        return response()->json(Pokemon::all());
    }
}
