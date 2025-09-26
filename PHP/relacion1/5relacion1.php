<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio5</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body>
    
    <h1>
        Ejercicio 4
    </h1>
    <p>
        <?php
            // Definimos TEMPERATURAS como un array asociativo constante
            define("TEMPERATURAS", 
            [
                "Lunes" => 25,
                "Martes" => 25,
                "Miércoles" => 26,
                "Jueves" => 26,
                "Viernes" => 26,
                "Sábado" => 27,
                "Domingo" => 27
            ]);

            // Obtenemos las claves del array TEMPERATURAS
            $claves = array_keys(TEMPERATURAS);

            // Mostramos la temperatura del primer día (Lunes)
            echo "Temperatura del primer día (Lunes): ", TEMPERATURAS['Lunes'], " °C<br><br>";

            // Mostramos las temperaturas de todos los días
            echo "Temperaturas de la semana: <br>";
            for ($i = 0; $i < count($claves); $i++) 
            {
                $dia = $claves[$i];
                echo "$dia: ", TEMPERATURAS[$dia], " °C<br>";
            }
            echo "<br>";

            // Mostramos temperaturas en lista numerada
            echo "Temperaturas de la semana (lista numerada): <br>";
            echo "<ol>";
            for ($i = 0; $i < count($claves); $i++) 
            {
                $dia = $claves[$i];
                echo "<li>$dia: ", TEMPERATURAS[$dia], " °C</li>";
            }
            echo "</ol>";
        ?>
    </p>

    <p>
        <?php
            echo "<br><br><h2>Explicacion</h2>";

            $temperaturas = [
                            "Lunes" => 32, 
                            "Martes" => 29,
                            "Miércoles" => 25,
                            "Jueves" => 30,
                            "Viernes" => 24,
                            "Sábado" => 28,
                            "Domingo" => 31
                            ];

            echo "Temperatura del primer dia de la semana (lunes): ", $temperaturas["Lunes"];

            echo "<br><br>Temperatura de todos los dias de la semana: <br>";

            //echo simple sin formateo html
            echo "<h3> Saltando de línea </h3>";
            foreach ($temperaturas as $dia => $temp) 
            {
                echo "$dia : $temp", "<br>";
            }

            //echo en forma de lista
            echo "<h3> En forma de lista </h3>";
            echo "<ol>";
            foreach ($temperaturas as $dia => $temp) 
            {
                echo "<li>", "$dia : $temp", "</li>";
            }
            echo "</ol>";

            //echo en forma de tabla
            echo "<h3> En forma de tabla </h3>";
            echo "<table style='border: black solid 1px'>"; // Los estilos no es recomendable ponerlos aquí es HORRRROROSO, usaremos Bootstrap
            foreach ($temperaturas as $dia => $temp) 
            {
                echo "<tr>", "<td>$dia</td> <td>$temp</td>", "</tr>";
            }
            echo "</table>";


        ?>
    </p>

</body>
</html>