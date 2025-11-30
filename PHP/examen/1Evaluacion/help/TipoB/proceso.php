<?php
/**
 * Comprueba si todos los caracteres de una cadena están incluidos en otra.
 *
 * @param string $frase La cadena principal a buscar.
 * @param string $caracteres La cadena con los caracteres que deben estar incluidos.
 * @param bool $caseSensitive Si la comparación es sensible a mayúsculas/minúsculas (true por defecto).
 * @return bool Devuelve true si todos los caracteres están en la frase, false si no.
 */
function estanIncluidos(string $frase, string $caracteres, bool $caseSensitive = true): bool {
    // 1. Manejar la sensibilidad a mayúsculas/minúsculas
    if (!$caseSensitive) {
        // Se usa mb_strtolower para manejar correctamente caracteres multi-byte
        $frase = mb_strtolower($frase, 'UTF-8');
        $caracteres = mb_strtolower($caracteres, 'UTF-8');
    }

    // 2. Comprobar la inclusión de cada carácter de la cadena 'caracteres' en 'frase'
    $len_caracteres = mb_strlen($caracteres, 'UTF-8');

    // Recorrer cada carácter de la cadena 'caracteres'
    for ($i = 0; $i < $len_caracteres; $i++) {
        $char = mb_substr($caracteres, $i, 1, 'UTF-8');

        // strpos/mb_strpos busca la primera ocurrencia de $char en $frase.
        // Si la posición es false (no encontrado), el carácter no está incluido.
        if (mb_strpos($frase, $char, 0, 'UTF-8') === false) {
            return false; // Devuelve false si al menos un carácter no se encuentra
        }
    }

    // Si el bucle termina, significa que todos los caracteres se encontraron.
    return true; // Devuelve true
}

// -----------------------------------------------------------------
// Lógica de Procesamiento
// -----------------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso denegado. Este script solo acepta peticiones POST del formulario.");
}

// 1. Descargar los datos y evitar ataque XSS 
// Se usa htmlspecialchars para prevenir XSS al mostrar los datos.
$frase_raw = $_POST['frase'] ?? '';
$caracteres_raw = $_POST['caracteres'] ?? '';

$frase_safe = htmlspecialchars($frase_raw, ENT_QUOTES, 'UTF-8');
$caracteres_safe = htmlspecialchars($caracteres_raw, ENT_QUOTES, 'UTF-8');

echo "<h2>Resultados de la Comprobación de Inclusión</h2>";
echo "<p><strong>Frase introducida:</strong> {$frase_safe}</p>";
echo "<p><strong>Caracteres a buscar:</strong> {$caracteres_safe}</p>";
echo "<hr>";

// 2. Invocar la función dos veces

// Invocación 1: con el parámetro caseSensitive a false 
$resultado_insensitive = estanIncluidos($frase_raw, $caracteres_raw, false);

echo "<h3>1. Comparación Case-Insensitive (ignora mayúsculas/minúsculas):</h3>";
echo "<p>Resultado: <strong>" . ($resultado_insensitive ? 'TRUE' : 'FALSE') . "</strong></p>";
echo "<p><em>Ejemplo: estanIncluidos('Murcielago','AEIOU', false) → TRUE [cite: 61]</em></p>";
echo "<hr>";

// Invocación 2: sin el parámetro caseSensitive (por defecto es true) 
$resultado_sensitive = estanIncluidos($frase_raw, $caracteres_raw);

echo "<h3>2. Comparación Case-Sensitive (por defecto):</h3>";
echo "<p>Resultado: <strong>" . ($resultado_sensitive ? 'TRUE' : 'FALSE') . "</strong></p>";
echo "<p><em>Ejemplo: estanIncluidos('Murcielago','AEIOU') → FALSE [cite: 60]</em></p>";
?>