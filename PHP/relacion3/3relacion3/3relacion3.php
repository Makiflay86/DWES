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
                    <input class="form-control" type="number" step="1" min="0" placeholder="0" name="numero1" id="numero1">
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="numero2">Introduce número 2: </label>
                    <input class="form-control" type="number" step="1" min="0" placeholder="0" name="numero2" id="numero2">
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

                if (isset($_GET["numero1"]))
                {
                    $numero = $_GET["numero1"];
                    $numero2 = $_GET["numero2"];
                    
                    echo `<p class="col-2">`;

                    echo "<table class='text-center'>";
                    while ($numero != $numero2)
                    {
                        echo "<tr>";
                        echo "<td>";

                        echo "$numero ";
                        echo "$numero2";
                        
                        echo "<td>";
                        echo "</tr>";
                        if ($numero > $numero2)
                        {
                            $numero = MCD($numero, $numero2);

                        } else 
                        {
                            $numero2 = MCD($numero, $numero2);
                        }
                    }
                    echo "</table>";

                    echo `</p>`;
                }
            ?>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>