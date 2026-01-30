<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $fillable = 
        [
            'titulo', 
            'genero', 
            'precio', 
            'stock', 
            'fecha_lanzamiento', 
            'en_oferta'
        ];
}
