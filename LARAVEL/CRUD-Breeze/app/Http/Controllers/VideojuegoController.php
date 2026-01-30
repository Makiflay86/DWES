<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class VideojuegoController extends Controller
{
    public function index()
    {
        // Recuperamos todos los videojuegos de la BD
        $videojuegos = Videojuego::all();
        // Enviamos los datos a la vista index.blade.php
        return view('videojuegos.index', compact('videojuegos'));
    }

    public function create()
    {
        // Retornamos la vista del formulario de creación
        return view('videojuegos.create');
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
        return redirect()->route('videojuegos.index')->with('success', 'Juego creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        //
    }

    public function edit(Videojuego $videojuego) 
    {
        return view('videojuegos.edit', compact('videojuego'));
    }

    public function update(Request $request, Videojuego $videojuego) 
    {
        $request->validate([
            'titulo' => 'required', 'genero' => 'required', 'precio' => 'required|numeric',
            'stock' => 'required|integer', 'fecha_lanzamiento' => 'required|date'
        ]);
        $videojuego->update($request->all());
        return redirect()->route('videojuegos.index')->with('success', 'Actualizado con éxito');
    }

    public function destroy(Videojuego $videojuego) 
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index')->with('success', 'Eliminado correctamente');
    }
}
