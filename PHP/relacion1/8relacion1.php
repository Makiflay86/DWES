<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio8</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">

    <h1>
        Script con 2 arrays asociativas
    </h1>

    <p>
        <?php
            $rubrica = 
            [
                "inicial" => 0.20,
                "primera" => 0.30,
                "segunda" => 0.20,
                "tercera" => 0.30
            ];

            $calificaciones = 
            [
                "inicial" => 8,
                "primera" => 5,
                "segunda" => 9,
                "tercera" => 6
            ];

            echo "-- Tabla con la Rúbrica --<br>";
            foreach ($rubrica as $prueba => $peso) 
            {
                echo "$prueba : $peso <br>";
            }

            echo "<br>-- Tabla con las notas de un alumno --<br>";
            foreach ($calificaciones as $prueba => $nota) 
            {
                echo "$prueba : $nota <br>";
            }

            echo "<br>-- La nota final de un alumno --<br>";
            $notaFinal = 0; // Inicializamos a 0 el acumulador
            foreach ($rubrica as $prueba => $peso)  // Recorro un array secuencialmente
            {
                $notaFinal += $peso * $calificaciones[$prueba]; // Acumulación de valores
            }

            echo "<p>";
            if ($notaFinal >= 5)
            {
                echo "Enhorabuena, has aprobado con un: ", $notaFinal;

            } else
            {
                echo "Lo sentimos, más suerte para la próxima: ", $notaFinal;
            }
            echo "</p>";

        ?>
    </p>

</body>
</html>