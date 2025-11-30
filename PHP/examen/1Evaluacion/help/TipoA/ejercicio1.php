<?php
// Incluir la librería de funciones [cite: 12]
require_once 'librería_examen.php';

// CÓDIGO DEL FORMULARIO DE ENTRADA DEL EJERCICIO 1:
// Se utiliza el método POST para que se llame a sí mismo 
$form_code = <<<HTML
<form method="POST" action="ejercicio1.php">
    <h3>Introduce dos cadenas y te calculo la distancia Hamming entre
    ellas</h3>
    <div>
        <label for="cadena1">Cadena 1:</label>
        <input type="text" id="cadena1" name="cadena1" required>
    </div>
    <div>
        <label for="cadena2">Cadena 2:</label>
        <input type="text" id="cadena2" name="cadena2" required>
    </div>
    <div>
        <button type="submit">Enviar</button>
    </div>
</form>
HTML;

// 1. Mostrar el formulario si no hay datos POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['cadena1'], $_POST['cadena2'])) {
    echo $form_code;
    exit;
}

// 2. Evitar un posible ataque XSS vía formulario 
// htmlspecialchars se usa para sanitizar las entradas antes de mostrarlas en el HTML.
// Las versiones 'raw' se usan para el cálculo de la distancia.
$cadena1_raw = $_POST['cadena1'];
$cadena2_raw = $_POST['cadena2'];

$cadena1_safe = htmlspecialchars($cadena1_raw, ENT_QUOTES, 'UTF-8');
$cadena2_safe = htmlspecialchars($cadena2_raw, ENT_QUOTES, 'UTF-8');

echo "<h2>Resultados de la Distancia Hamming</h2>";
echo "<p>Cadena A: <strong>{$cadena1_safe}</strong></p>";
echo "<p>Cadena B: <strong>{$cadena2_safe}</strong></p>";
echo "<hr>";

// 3. Invocar la función dos veces 

// Primera invocación: con el parámetro caseSensitive a false 
$distancia_insensitive = distanciaHamming($cadena1_raw, $cadena2_raw, false);

echo "<h3>Comparación Case-Insensitive (caseSensitive = false):</h3>";
if ($distancia_insensitive === -1) {
    echo "<p style='color: red;'><strong>ERROR: Las cadenas tienen longitudes diferentes.</strong></p>"; // 
} else {
    echo "<p>Distancia Hamming: <strong>{$distancia_insensitive}</strong></p>";
}

echo "<br>";

// Segunda invocación: sin el parámetro caseSensitive (por defecto es true) [cite: 9, 16]
$distancia_sensitive = distanciaHamming($cadena1_raw, $cadena2_raw);

echo "<h3>Comparación Case-Sensitive (por defecto):</h3>";
if ($distancia_sensitive === -1) {
    echo "<p style='color: red;'><strong>ERROR: Las cadenas tienen longitudes diferentes.</strong></p>"; // 
} else {
    echo "<p>Distancia Hamming: <strong>{$distancia_sensitive}</strong></p>";
}

// Mostrar de nuevo el formulario
echo "<hr>";
echo $form_code;
?>