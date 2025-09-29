<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio10</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">

    <h1>
        Ecuación de 2º Grado
    </h1>

    <p>
        <?php
            $a = 1; 
            $b = -4;
            $c = 3;
            $radical = ($b ** 2 - 4 * $a * $c); // pow($b,2) == $b ** 2

            if ($a == 0)
            {
                echo "No puede ser 0 'a' porque no se puede dividir entre 0.";
            } elseif ($radical < 0)
            {
                echo "Las raices no son reales."; 

            } else
            {
                
                $x1 = ((-$b + sqrt($radical)) / (2 * $a)); // Obligatorio los paréntesis
                $x2 = ((-$b - sqrt($radical)) / (2 * $a));
                echo "Las raices son: $x1 y $x2.";
            }



            


            //si a es 0 -> solución - Esta ya lo esta hecho
            //si b es 0 -> solución - No hace falta, ¿eso creo?
            //si c es 0 -> solución - No hace falta, ¿eso creo?
            //si no es así como esta - Esta hecho.
        ?>
    </p>

</body>
</html>