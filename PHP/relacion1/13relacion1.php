<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio13</title>
</head>
<body style="text-align: center;">
    <h1>
        Factorial de un número entero
    </h1>
    <p>
        <?php
            $numero = 5;
            if ($numero < 0)
            {
                echo "El factorial de $numero no esta definido, debe ser un número natural.";
            } else
            {
                $factorial = 1;

                for ($i = $numero; $i > 1; $i--) 
                { 
                    $factorial *= $i;
                }

                echo "El factorial de $numero es: $factorial.";
            }
            
        ?>
    </p>
</body>
</html>