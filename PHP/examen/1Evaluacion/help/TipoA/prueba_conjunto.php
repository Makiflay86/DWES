<?php
// Incluir la definición de la clase Conjunto
require_once 'Conjunto.php';

echo "<h1>Prueba de la Clase Conjunto</h1>";
echo "<h2>1. Creación e Inclusión de Elementos</h2>";

// Crear dos conjuntos con un tamaño máximo de 10 elementos cada uno
$c1 = new Conjunto(10);
$c2 = new Conjunto(10);

echo "<h3>Conjunto 1 (Números Primos):</h3>";
echo "Intentando incluir: 2, 3, 5, 7, 10 (el 10 no es primo, pero lo incluimos).\n";

// Incluir elementos en el Conjunto 1
$c1->incluir(2);
$c1->incluir(3);
$c1->incluir(5);
$c1->incluir(7);
$c1->incluir(10); // Elemento no primo
$c1->incluir(2); // Intento de incluir un duplicado (debe fallar)

echo "<p>Conjunto 1 (\$c1): " . $c1 . "</p>"; // Muestra {2, 3, 5, 7, 10}
echo "<hr>";

echo "<h3>Conjunto 2 (Números Pares):</h3>";
echo "Intentando incluir: 4, 6, 8, 10, 12.\n";

// Incluir elementos en el Conjunto 2
$c2->incluir(4);
$c2->incluir(6);
$c2->incluir(8);
$c2->incluir(10);
$c2->incluir(12);
$c2->incluir(4); // Intento de incluir un duplicado (debe fallar)

echo "<p>Conjunto 2 (\$c2): " . $c2 . "</p>"; // Muestra {4, 6, 8, 10, 12}
echo "<hr>";

echo "<h2>2. Comprobación de Pertenencia (incluido)</h2>";

echo "<p>¿El 5 está incluido en \$c1 (Primos)? " . ($c1->incluido(5) ? 'Sí' : 'No') . "</p>";
echo "<p>¿El 5 está incluido en \$c2 (Pares)? " . ($c2->incluido(5) ? 'Sí' : 'No') . "</p>";
echo "<hr>";

echo "<h2>3. Operaciones de Conjuntos</h2>";

// 3.1 Intersección
$interseccion = $c1->interseccion($c2);
echo "<h3>Intersección (\$c1 ∩ \$c2)</h3>";
echo "<p>Elementos comunes (solo el 10): <strong>" . $interseccion . "</strong></p>"; // Resultado esperado: {10}

// 3.2 Unión
$union = $c1->union($c2);
echo "<h3>Unión (\$c1 ∪ \$c2)</h3>";
echo "<p>Todos los elementos sin repetición: <strong>" . $union . "</strong></p>"; // Resultado esperado: {2, 3, 5, 7, 10, 4, 6, 8, 12}

// 3.3 Diferencia (Diferencia Simétrica)
$diferencia = $c1->diferencia($c2);
echo "<h3>Diferencia Simétrica (\$c1 Δ \$c2)</h3>";
echo "<p>Elementos que NO tienen en común: <strong>" . $diferencia . "</strong></p>"; // Resultado esperado: {2, 3, 5, 7, 4, 6, 8, 12}