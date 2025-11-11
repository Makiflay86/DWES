<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 17 - Formulario</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 mb-3 p-5 col-4">
        <div>
            <?php
                // --- FUNCIONES AUXILIARES REQUERIDAS ---

                // Función auxiliar para determinar si un número es primo (reutilizada del E. 16).
                function esPrimo($n) {
                    if ($n <= 1) return false;
                    for ($i = 2; $i * $i <= $n; $i++) {
                        if ($n % $i == 0) return false;
                    }
                    return true;
                }

                // Implementación de array_all: comprueba si TODOS cumplen la condición.
                function array_all(array $array, callable $callback): bool {
                    return count($array) === count(array_filter($array, $callback));
                }

                // Implementación de array_any: comprueba si ALGUNOS cumplen la condición.
                function array_any(array $array, callable $callback): bool {
                    return count(array_filter($array, $callback)) > 0;
                }

                // Función de ayuda para formatear la salida en un alert de Bootstrap.
                function show_result($title, $result, $color) {
                    echo "<div class='alert alert-$color' role='alert'>";
                    echo "<h5>$title</h5>";
                    if (is_array($result)) {
                        // Limitar la salida para arrays grandes
                        $output = (count($result) > 10) ? implode(', ', array_slice($result, 0, 10)) . ", ..." : implode(', ', $result);
                        echo "<p>" . $output . "</p>";
                    } elseif (is_bool($result)) {
                        echo "<p>" . ($result ? 'SÍ (Verdadero)' : 'NO (Falso)') . "</p>";
                    } else {
                        echo "<p>$result</p>";
                    }
                    echo "</div>";
                }

                // --- 1. INICIALIZACIÓN DE ARRAYS ---

                // Array de números impares entre 1 y 20
                // Se usa range(1, 20) y array_filter con una función flecha.
                $impares = array_filter(range(1, 20), fn($n) => $n % 2 !== 0);
                $impares = array_values($impares); // Reindexar después del filtrado

                // Array de múltiplos de 3 entre 1 y 40
                $multiplosDeTres = array_filter(range(1, 40), fn($n) => $n % 3 === 0);
                $multiplosDeTres = array_values($multiplosDeTres); // Reindexar

            ?>
                    <h3 class="text-center text-info-emphasis pb-3">Resultados de Manipulación de Arrays</h3>
                    <p class="text-start">Array *Impares (1-20)*: <?php echo implode(', ', $impares); ?></p>
                    <p class="text-start">Array *Múltiplos de 3 (1-40)*: <?php echo implode(', ', $multiplosDeTres); ?></p>
                    <hr>
            <?php

                // --- 2. APLICACIÓN DE FUNCIONES DE ARRAY ---

                // ● Aplica array_count (count) para comprobar cuántos pares tienen
                show_result("count(): Cantidad de elementos en Impares", count($impares), "success");

                // ● Aplica array_any para comprobar si hay algún múltiplo de 5 (usando $multiplosDeTres)
                $any_multiple_of_5 = array_any($multiplosDeTres, fn($n) => $n % 5 === 0);
                show_result("array_any: ¿Hay algún múltiplo de 5 en MúltiplosDeTres?", $any_multiple_of_5, "warning");

                // ● Aplica array_filter para extraer los que sean primos (usando $impares)
                $primos_impares = array_filter($impares, 'esPrimo');
                show_result("array_filter: Impares que son Primos", $primos_impares, "primary");

                // ● Aplica array_find (simulado): Primera ocurrencia de número de dos cifras idénticas (usando $impares)
                $identicos = array_filter($impares, fn($n) => $n >= 10 && $n <= 99 && $n % 11 === 0);
                $first_match = reset($identicos) ?: 'No encontrado'; // reset() obtiene el primer elemento
                show_result("array_find (simulado): Primera cifra idéntica en Impares", $first_match, "info");

                // ● Aplica array_map para obtener el cuadrado de cada valor (usando $impares)
                $cuadrados = array_map(fn($n) => $n * $n, $impares);
                show_result("array_map: Cuadrados de los Impares (primeros 10)", array_slice($cuadrados, 0, 10), "danger");

                // ● Aplica array_walk para sustituir cada valor por su doble (usando $multiplosDeTres)
                $dobles = $multiplosDeTres;
                array_walk($dobles, function (&$n) {
                    $n = $n * 2;
                });
                show_result("array_walk: MúltiplosDeTres doblados (modificados por referencia)", $dobles, "secondary");

                // ● Aplica array_intersect para saber qué valores están en ambos arrays
                $interseccion = array_intersect($impares, $multiplosDeTres);
                show_result("array_intersect: Valores comunes a ambos arrays", $interseccion, "dark");

                // --- EJEMPLO DE OTRAS FUNCIONES SOLICITADAS ---

                // array_reverse (invierte el orden)
                $impares_invertidos = array_reverse($impares);
                show_result("array_reverse: Impares invertidos", $impares_invertidos, "light");

                // rsort (ordena de forma descendente, modifica el array)
                $descendente = $multiplosDeTres; // Copia
                rsort($descendente); // true si es exitoso
                show_result("rsort: MúltiplosDeTres ordenados de forma descendente", $descendente, "light");
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>