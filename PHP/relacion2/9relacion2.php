<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 9</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <!-- Cuando el cálculo está en el pripio archiv
             hay que llamarlo desde action (así mismo) -->
            <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                <h3 class="text-info-emphasis">Calculadora básica con 2 números y un operador</h3>
                
                <div class="mb-3">
                    <label class="form-label" for="numero1">Introduce número 1: </label>
                    <input class="form-control" type="number" step="0.01" min="0" placeholder="0,00" name="numero1" id="numero1">
                </div>    
                
                <div class="mb-3">
                    <label class="form-label" for="operador">Elige operador: </label>
                    <select class="form-select" name="operador" id="operador">
                        <option value="suma">+</option>
                        <option value="resta">-</option>
                        <option value="producto">*</option>
                        <option value="division">/</option>
                        <option value="resto">%</option>
                    </select>
                </div>
        
                <div class="mb-3">
                    <label class="form-label" for="numero2">Introduce número 2: </label>
                    <input class="form-control" type="number" step="0.01" placeholder="0,00" name="numero2" id="numero2">
                </div>
                
                <input class="form-control" type="submit" value="Enviar">
            </form>    
        </div>
    
        <!-- A continuación saldrá el resultado del cálculo realizado tras el envío -->
        <p id="resultado" class="text-center mt-5">
            <?php
                /* Haremos que se ejecute los cálculas tras el envío */
                if (!empty($_GET))
                {
                    /* Descargo los valores en 3 variables locales */
                    $numero1 = $_GET['numero1'];
                    $numero2 = $_GET['numero2'];
                    $operador = $_GET['operador'];

                    /* Vamos a utilizar match para introducri esta bifurcación
                       múltiple con una sintaxis más elegante */
                    $resultado = match ($operador)
                    {
                        "suma" => $numero1 + $numero2,
                        "resta" => $numero1 - $numero2,
                        "producto" => $numero1 * $numero2,
                        "division" => $numero1 / $numero2,
                        "resto" => $numero1 % $numero2
                    };

                    echo "El resultado es: ", $resultado;
                }
            ?>
        </p>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>