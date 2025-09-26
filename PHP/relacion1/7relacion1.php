<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio7</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body>

    <h2>
        Cálcular nota final
    </h2>

    <p>
        <?php
            $nota1 = 6;
            $nota2 = 8;
            $faltas = 2;
            $notaFinal;
            echo "Las dos notas son: ", $nota1, " y ", $nota2, ".";
            echo "<br>Tiene ", $faltas, " faltas.<br>";

            $notaFinal = (($nota1 + $nota2) / 2);

            if ($faltas > 0)
            {
                $notaFinal = ($notaFinal - ($faltas * 0.25));

            };

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