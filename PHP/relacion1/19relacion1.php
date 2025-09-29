<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 19</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">
    <h1>
        Convertir a binario un número natural decimal
    </h1>
    <p>
        <?php
            $numero = 10; 
            
            if ($numero < 0)
            {
                echo "ERROR: El número no puede ser negativo.";

            } else
            {
                echo "Este es el número $numero y este en binario ", decbin($numero);
            }
        ?>
    </p>
</body>
</html>