<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class SumaController extends Controller
{
    // función inicial, lo que se debe mostrar 
    //cuando se entra al formulario por get

    function index()
    {
        return view('suma', ['resul' => null]);
    }

    function suma(Request $request)
    {     // recibe una request con data
        $numero1 = $request->input('numero1');
        $numero2 = $request->input('numero2');
        $resultado = $numero1 + $numero2;   
        // echo "El resultado es $resultado
        return view('suma', ['resul' => $resultado]); 
    }
}