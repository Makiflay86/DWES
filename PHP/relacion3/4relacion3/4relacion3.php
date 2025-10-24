<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 4</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
    <div class="container">

        <div class="row">
        <!-- Ejercicio 1 -->
            <div class="col-4 mt-5">
                <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                    <h3 class="text-info-emphasis">1º Es Primo</h3>
                    
                    <div class="mb-3">
                        <label class="form-label" for="numero1">Introduce número 1: </label>
                        <input class="form-control" type="number" step="1" min="0" placeholder="0" name="numero1" id="numero1">
                    </div>    
                    
                    <input class="form-control" type="submit" value="Enviar">
                </form>    
            </div>

        <!-- Ejercicios 2 -->
            <div class="col-4 mt-5">
                <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                    <h3 class="text-info-emphasis">2º Factorial de un número entero</h3>
                    
                    <div class="mb-3">
                        <label class="form-label" for="numero2">Introduce número 1: </label>
                        <input class="form-control" type="number" step="1" min="0" placeholder="0" name="numero2" id="numero2">
                    </div>    
                    
                    <input class="form-control" type="submit" value="Enviar">
                </form>    
            </div>

        <!-- Ejercicio 3 -->
            <div class="col-4 mt-5">
                <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                    <h3 class="text-info-emphasis">3º Cálculo del MCD</h3>
                    
                    <div class="mb-3">
                        <label class="form-label" for="numero3">Introduce número 1: </label>
                        <input class="form-control" type="number" step="1" min="1" placeholder="0" name="numero3" id="numero3">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="numero32">Introduce número 2: </label>
                        <input class="form-control" type="number" step="1" min="1" placeholder="0" name="numero32" id="numero32">
                    </div>
                    
                    <input class="form-control" type="submit" value="Enviar">
                </form>    
            </div>

        </div>

        <div class='row mx-auto d-flex justify-content-center align-items-center mt-5 p-5 border border-warning rounded shadow bg-light'>
            <?php
                echo "<h3>1º Es Primo</h3><hr>";
                function esPrimo($num)
                {
                    for ($i = 2; $i < $num; $i++)
                    {
                        if ($num % $i == 0)
                        {
                            return false;
                        }
                    }
                    return true;
                }

                if (isset($_GET["numero1"]))
                {
                    $numero = $_GET["numero1"];

                    echo "<p class='col-4 mx-auto d-flex justify-content-center align-items-center mt-5 p-5'>";
                    for ($j = 1; $j <= $numero; $j++)
                    {
                        if (esPrimo($j))
                        {
                            echo "<span class='pe-3'>".$j."</span>";
                        }
                    }
                    echo `</p>`;
                }



                echo "<h3>2º Factorial de un número entero</h3><hr>";
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

                if (isset($_GET["numero2"]))
                {
                    $numero = $_GET["numero2"];
                    $calculo = 1;

                    echo "<p class='col-4 mx-auto d-flex justify-content-center align-items-center mt-5 p-5'>";
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



                echo "<h3>3º MCD</h3><hr>";

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
                
                if (isset($_GET["numero3"]) && isset($_GET["numero32"])) 
                {
                    $n1 = intval($_GET["numero3"]);
                    $n2 = intval($_GET["numero32"]);

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