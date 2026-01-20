<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    public function index() 
    {
        $productos = Producto::all(); /* Con esto obtenemos toda la tabla de productos */
        return view('productos.index', compact('productos'));
    }
}
