<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 16 - Formulario</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 mb-3 p-5 col-4">
        <div>
            <?php
                // Función auxiliar para determinar si un número es primo.
                // Se usa como callback para array_filter.
                function esPrimo($n) 
                {
                    if ($n <= 1) return false;
                    for ($i = 2; $i * $i <= $n; $i++) 
                    {
                        if ($n % $i == 0) return false;
                    }
                    return true;
                }

                // Implementación de array_all (comprueba si TODOS cumplen la condición)
                function array_all(array $array, callable $callback): bool 
                {
                    // Si el número de elementos que cumplen la condición es igual al total, todos cumplen.
                    return count($array) === count(array_filter($array, $callback));
                }

                // Implementación de array_any (comprueba si ALGUNOS cumplen la condición)
                function array_any(array $array, callable $callback): bool 
                {
                    // Si hay algún elemento después de filtrar, entonces al menos uno cumple.
                    return count(array_filter($array, $callback)) > 0;
                }

                // 1. Inicializar el array del 1 al 100
                $numeros = range(1, 100);

                // Función de ayuda para formatear la salida en Bootstrap
                function show_result($title, $result, $color) 
                {
                    echo "<div class='alert alert-$color' role='alert'>";
                    echo "<h5>$title</h5>";
                    if (is_array($result)) {
                        echo "<p>" . implode(', ', $result) . "</p>";
                    } elseif (is_bool($result)) {
                        echo "<p>" . ($result ? 'SÍ (Verdadero)' : 'NO (Falso)') . "</p>";
                    } else {
                        echo "<p>$result</p>";
                    }
                    echo "</div>";
                };


                /* --- INICIO DE LA LÓGICA DEL EJERCICIO 16 --- */

                /* 1. Inicializar el array del 1 al 100 */

                $numeros = range(1, 100);
                echo "<h6>Array generado (1-100)</h6>";

                // ● Aplica array_all para comprobar si todos los números son positivos
                $all_positive = array_all($numeros, fn($n) => $n > 0);
                show_result("array_all: ¿Todos los números son positivos?", $all_positive, "success");

                // ● Aplica array_any para comprobar si hay algún múltiplo de 5
                $any_multiple_of_5 = array_any($numeros, fn($n) => $n % 5 === 0);
                show_result("array_any: ¿Hay algún múltiplo de 5?", $any_multiple_of_5, "warning");

                // ● Aplica array_filter para extraer los que sean primos
                $primos = array_filter($numeros, 'esPrimo');
                show_result("array_filter: Números primos (entre 1 y 100)", $primos, "primary");

                // ● Aplica array_find (simulado): Primera ocurrencia de número de dos cifras idénticas
                $identicos = array_filter($numeros, fn($n) => $n >= 10 && $n <= 99 && $n % 11 === 0);
                // array_find se simula con array_filter y obteniendo el primer elemento
                $first_match = reset($identicos) ?: 'No encontrado'; 
                show_result("array_find (11, 22...): Primera ocurrencia", $first_match, "info");

                // ● Aplica array_map para obtener el cuadrado de cada valor
                $cuadrados = array_map(fn($n) => $n * $n, $numeros);
                show_result("array_map: Los primeros 10 cuadrados", array_slice($cuadrados, 0, 10), "danger");

                // ● Aplica array_walk para sustituir cada valor por su doble
                $dobles = $numeros; // Usamos una copia para demostrar el array modificado
                // La función anónima debe usar el paso por REFERENCIA (&) para modificar el array
                array_walk($dobles, function (&$n) {
                    $n = $n * 2;
                });
                show_result("array_walk: Los primeros 10 valores doblados", array_slice($dobles, 0, 10), "secondary");
                ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>