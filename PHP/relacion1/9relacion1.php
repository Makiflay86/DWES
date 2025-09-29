<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio9</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">
    
    <h1>
        Tipos de triángulo
    </h1>
    <p>
        <?php
            $lado1 = 3.0; // Si quisieramos que fueran reales, ponemos .0
            $lado2 = 3.0;
            $lado3 = 3.0;

            if ($lado1 == $lado2 && $lado2 == $lado3)
            {
                echo "Es un triángulo equilátero.";

            } elseif ($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3)
            {
                echo "Es un triángulo isósceles.";

            } else
            {
                echo "Es un triángulo escaleno.";
            };
        ?>
    </p>

</body>
</html>