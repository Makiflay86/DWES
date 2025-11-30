<?php
require_once 'Pila.php';

echo "<h2>Comprobación de la Clase Pila</h2>";

// 1. Crea una pila de tamaño 10 [cite: 91]
$pila = new Pila(10);
echo "<p>1. Pila creada con tamaño máximo: 10.</p>";

// 2. Inserta un 5 en la pila (y controla que pueda estar llena) [cite: 92]
if ($pila->push(5) === null) {
    echo "<p style='color: red;'>2. ERROR: No se pudo insertar 5. La pila está llena.</p>";
} else {
    echo "<p>2. Elemento 5 insertado. Pila actual: " . $pila . "</p>";
}

// 3. Inserta un 3 en la pila (y controla que pueda estar llena) [cite: 93]
if ($pila->push(3) === null) {
    echo "<p style='color: red;'>3. ERROR: No se pudo insertar 3. La pila está llena.</p>";
} else {
    echo "<p>3. Elemento 3 insertado. Pila actual: " . $pila . "</p>";
}

// 4. Muestra el tamaño de la pila [cite: 94]
echo "<p>4. Tamaño actual de la pila (getElementos): <strong>" . $pila->getElementos() . "</strong></p>";

// 5. Extrae un elemento de la pila (y controla que pueda estar vacía) [cite: 95]
$extraido = $pila->pop();
if ($extraido === null) {
    echo "<p style='color: red;'>5. ERROR: No se pudo extraer. La pila está vacía.</p>";
} else {
    echo "<p>5. Elemento extraído (POP): <strong>{$extraido}</strong>. Pila actual: " . $pila . "</p>";
}

// 6. Muestra el tamaño de la pila [cite: 96]
echo "<p>6. Tamaño actual de la pila (getElementos): <strong>" . $pila->getElementos() . "</strong></p>";

// 7. Muestra la pila completa [cite: 97]
echo "<p>7. Pila completa (toString): <strong>" . $pila . "</strong></p>";

// Prueba adicional de la restricción de tamaño
$pila_pequena = new Pila(2);
$pila_pequena->push(1);
$pila_pequena->push(2);
echo "<br><p>Prueba Extra (Pila de tamaño 2): " . $pila_pequena . "</p>";
if ($pila_pequena->push(3) === null) {
    echo "<p style='color: green;'>✅ Control de Pila llena (push(3)): La pila devolvió **null** porque está llena.</p>";
}
?>