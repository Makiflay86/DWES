<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 18</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">
    <h1>
        Calcular el máximo común divisor (MCD) usando el algoritmo Euclides
    </h1>
    <p>
        <?php
            $numero1 = 12;
            $numero2 = 8;

            echo "<h3>Los números son: $numero1 y $numero2.</h3>";

            if ($numero1 <= 0 || $numero2 <= 0)
            {
                echo "Los números no pueden ser negativo.";

            } else
            {
                while($numero1 != $numero2)
                {
                    if ($numero1 > $numero2)
                    {
                        $numero1 -= $numero2;

                    } else
                    {
                        $numero2 -= $numero1;
                    }
                }

                echo "El máximo común divisor es: $numero1"; // Puedes ser $numero1 o $numero2, es indiferente
            }
        ?>
    </p>
</body>
</html> 