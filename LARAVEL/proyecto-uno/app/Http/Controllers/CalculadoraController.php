<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class CalculadoraController extends Controller
{
    function index()
    {
        return view('calculadora', ['resul' => null]);
    }

    function calculadora(Request $request)
    {
        $numero1 = $request->input('numero1');
        $numero2 = $request->input('numero2');
        $simbolo = $request->input('simbolo');

        if ($numero1 != "" || $numero2 != "")
        {
            switch ($simbolo)
            {
                case '+':
                    $resultado = $numero1 . " " . $simbolo . " " . $numero2 . " = " . $numero1 + $numero2;
                    break;
                case '-':
                    $resultado = $numero1 . " " . $simbolo . " " . $numero2 . " = " . $numero1 - $numero2;
                    break;
                case '*':
                    $resultado = $numero1 . " " . $simbolo . " " . $numero2 . " = " . $numero1 * $numero2;
                    break;
                case '/':
                    if ($numero2 == 0)
                    {
                        $resultado = "No se puede dividir entre 0.";    
    
                    } else 
                    {
                        $resultado = $numero1 . " " . $simbolo . " " . $numero2 . " = " . $numero1 / $numero2;
                    }
                    break;
                default:
                    $resultado = "Datos faltantes.";
                    break;
            }

        } else 
        {
            $resultado = "Datos faltantes.";
        }

        return view('calculadora', ['resul' => $resultado]); 
    }
}