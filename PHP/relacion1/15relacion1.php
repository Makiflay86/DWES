<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio 15</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">
    <h1>
        Programa que te dice si un número es primo o no
    </h1>
    <p>
        <?php
            $numero = 1;
            $i = 2;
            $primo = true;

            if ($numero <= 1)
            {
                echo "El número $numero debe ser un número natural.";   

            } else
            {
                do
                {
                    if ($numero % $i == 0)
                    {
                        $primo = false;
                    }

                    $i++;

                } while($primo && $i < $numero); // 2 motivos para tarminar: éxito o fracaso

                if ($i >= $numero) // Si sigue siendo primo true
                {
                    echo "El número $numero es primo.";

                } else // Si no, he salido por el otro motivo...
                {
                    echo "El número $numero tiene al menos un divisor ", ($i - 1), ".";
                }
            }
            
            

        ?>
    </p>
</body>
</html>