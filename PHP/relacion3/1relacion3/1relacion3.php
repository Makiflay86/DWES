<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 1</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-info-subtle">
    <div class="container">

        <div class="d-flex justify-content-center align-items-center mt-5">
            <form class="p-5 border border-warning rounded shadow bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                <h3 class="text-info-emphasis">Es Primo</h3>
                
                <div class="mb-3">
                    <label class="form-label" for="numero1">Introduce número 1: </label>
                    <input class="form-control" type="number" step="1" min="0" placeholder="0" name="numero1" id="numero1">
                </div>    
                
                <input class="form-control" type="submit" value="Enviar">
            </form>    
        </div>
    
        <?php
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

                echo "<p id='resultado' class='col-4 mx-auto d-flex justify-content-center align-items-center mt-5 p-5 border border-warning rounded shadow bg-light'>";
                for ($j = 1; $j <= $numero; $j++)
                {
                    if (esPrimo($j))
                    {
                        echo "<span class='pe-3'>".$j."</span>";
                    }
                }
                echo `</p>`;
            }
        ?>
    
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>