<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class VideojuegoController extends Controller
{
    public function index(Request $request)
    {
        $vista = $request->get('vista', 'tabla');

        $videojuegos = Videojuego::all();

        return view('videojuegos.index', compact('videojuegos', 'vista'));
    }


    public function create(Request $request)
    {
        $vista = $request->get('vista', 'tabla');
        return view('videojuegos.create', compact('vista'));
    }


    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $request->validate([
            'titulo' => 'required',
            'genero' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'fecha_lanzamiento' => 'required|date'
        ]);

        // Creamos el registro en la base de datos
        Videojuego::create($request->all());

        // Redirigimos al listado con un mensaje de éxito
        return redirect()->route('videojuegos.index', ['vista' => $request->vista])->with('success', 'Juego creado correctamente');
    }

    public function edit(Request $request, Videojuego $videojuego)
    {
        $vista = $request->get('vista', 'tabla');
        return view('videojuegos.edit', compact('videojuego', 'vista'));
    }


    public function update(Request $request, Videojuego $videojuego) 
    {
        $request->validate([
            'titulo' => 'required', 'genero' => 'required', 'precio' => 'required|numeric',
            'stock' => 'required|integer', 'fecha_lanzamiento' => 'required|date'
        ]);
        $videojuego->update($request->all());
        return redirect()->route('videojuegos.index', ['vista' => $request->vista])->with('success', 'Actualizado con éxito');
    }

    public function destroy(Request $request, Videojuego $videojuego) 
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index', ['vista' => $request->vista])->with('success', 'Eliminado correctamente');
    }
}
