<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 3</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
    <div class="container">

        <div class="d-flex justify-content-center align-items-center mt-5">
            <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                <h3 class="text-info-emphasis">Cálculo del MCD</h3>
                
                <div class="mb-3">
                    <label class="form-label" for="numero1">Introduce número 1: </label>
                    <input class="form-control" type="number" step="1" min="1" placeholder="0" name="numero1" id="numero1">
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="numero2">Introduce número 2: </label>
                    <input class="form-control" type="number" step="1" min="1" placeholder="0" name="numero2" id="numero2">
                </div>
                
                <input class="form-control" type="submit" value="Enviar">
            </form>    
        </div>
    
        <div class='row mx-auto d-flex justify-content-center align-items-center mt-5 p-5 border border-warning rounded shadow bg-light'>
            <?php
                /* RECURSIVIDAD */

                function MCD($n1, $n2)
                {
                    if ($n1 == $n2)
                    {
                        return $n1;

                    } else if ($n1 > $n2)
                    {
                        return MCD($n1 - $n2, $n2);

                    } else 
                    {
                        return MCD($n1, $n2 - $n1);
                    }
                }


                function divisionEuclidea($dividendo, $divisor)
                {
                    if ($dividendo < $divisor) 
                        {
                        return [0, $dividendo]; // cociente, resto

                    } else 
                    {
                        list($cociente, $resto) = divisionEuclidea($dividendo - $divisor, $divisor);
                        return [$cociente + 1, $resto];
                    }
                }
                
                
                if (isset($_GET["numero1"]) && isset($_GET["numero2"])) 
                {
                    $n1 = intval($_GET["numero1"]);
                    $n2 = intval($_GET["numero2"]);

                    echo "<p class='col-8'>";
                    echo "<h4 class='text-success'>Resultados:</h4>";

                    $mcd = MCD($n1, $n2);
                    echo "<p>El MCD de $n1 y $n2 es: <strong>$mcd</strong></p>";

                    list($cociente, $resto) = divisionEuclidea($n1, $n2);
                    echo "<p>División euclídea de $n1 ÷ $n2:</p>";
                    echo "<ul>";
                    echo "<li>Cociente: $cociente</li>";
                    echo "<li>Resto: $resto</li>";
                    echo "</ul>";
                    echo "</p>";
                }


            ?>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>