<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\CalculadoraController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

/* Antes */
/* Route::get('/suma', function () {
    return view('suma');
});

Route::post('/suma', function (Request $request) {     // recibe una request con data
    $numero1 = $request->input('numero1');
    $numero2 = $request->input('numero2');
    $resultado = $numero1 + $numero2;                 // calcula resultado para enviar
    // echo "El resultado es $resultado
    return view('suma', ['resul' => $resultado]); // invoca view con array asoc
}); */

/* Ahora */
Route::get('/suma', [SumaController::class, 'index']);
// extraigo la operatoria y la paso al controlador
Route::post('/suma', [SumaController::class, 'suma']);


/* Calculadora */
Route::get('/calculadora', [CalculadoraController::class, 'index']);
// extraigo la operatoria y la paso al controlador
Route::post('/calculadora', [CalculadoraController::class, 'calculadora']);