<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 2</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
    <div class="container">

        <div class="d-flex justify-content-center align-items-center mt-5">
            <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                <h3 class="text-info-emphasis">Factorial de un número entero</h3>
                
                <div class="mb-3">
                    <label class="form-label" for="numero1">Introduce número 1: </label>
                    <input class="form-control" type="number" step="1" min="0" placeholder="0" name="numero1" id="numero1">
                </div>    
                
                <input class="form-control" type="submit" value="Enviar">
            </form>    
        </div>
    
        <div class='row mx-auto d-flex justify-content-center align-items-center mt-5 p-5 border border-warning rounded shadow bg-light'>
            <?php
                /* RECURSIVIDAD */

                function factorial($n)
                {
                    if ($n == 1)
                    {
                        return 1;

                    } else 
                    {
                        return $n * factorial($n - 1);
                    }
                }

                if (isset($_GET["numero1"]))
                {
                    $numero = $_GET["numero1"];
                    $calculo = 1;
                    echo `<div class="col-2">`;
                    echo "<h4>Número introducido el $numero</h4>";
                    echo `</div>`;
                    
                    echo "<hr>";

                    echo `<p class="col-2">`;
                    for ($j = 1; $j <= $numero; $j++)
                    {
                        if (factorial($j) && $j == $numero)
                        {
                            $calculo *= $j;
                            echo "$j = $calculo";
                            
                        } else 
                        {
                            $calculo *= $j;
                            echo "$j * ";

                        }
                    }
                    echo `</p>`;
                }
            
            ?>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>