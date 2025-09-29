<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 17</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">
    <h1>
        Dividir 2 números naturales usando el algoritmo Euclides
    </h1>
    <p>
        <?php
            $dividendo = 5;
            $divisor = 6;
            $cociente = 0;
            $exit = true;

            echo "<h3>Los números son: $dividendo y $divisor.</h3>";

            if ($dividendo < $divisor || $dividendo <= 0 || $divisor <= 0)
            {
                echo "ERROR: Número 1 = $dividendo y Número 2 =  $divisor.";

            } else
            {
                do
                {
                    if ($dividendo < $divisor)
                    {
                        $exit = false;
                        
                    } else
                    {
                        $dividendo = $dividendo - $divisor;
                        $cociente++;
                    }

                } while($exit);

                echo "El cociente es: $cociente.<br>";
                echo "El resto es: $dividendo.";
            }
            
        ?>
    </p>
</body>
</html>