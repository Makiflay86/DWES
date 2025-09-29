<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacion 1 - Ejercicio 17</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <style>
        .divisor
        {
            color: red;
        }
    </style>
</head>
<body style="text-align: center;">
    <h1>
        Mostrar todos los divisors de un número entero y positivo
    </h1>
    <p>
        <?php
            $numero = 5;
            $solucion = "";

            if ($numero < 1)
            {
                echo "No puede tener divisores si es 0 o negativo.";
            } else 
            {
                echo "Los divisores de $numero son: <br>";
                for ($i = 1; $i <= $numero; $i++) 
                { 
                    if ($numero % $i == 0)
                    {
                        echo "<span class='divisor'>$i </span>";

                    } else
                    {
                        echo "$i ";
                    }
                }
            }

        ?>
    </p>
</body>
</html>