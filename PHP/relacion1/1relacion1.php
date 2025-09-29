<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio1</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body>
    
    <h1>
        Ejercicio 1 
    </h1>
    <h3>
        <?php 
            $nombre = "Francisco"; // Las variables empiezan por $ y no son fuertemente tipadas.
            echo "Hola $nombre"; // Una variable entre comillas dobles es sustituida por su valor.
            echo "<br> Hola Mundo"; // Puedo usar comillas simple.
            echo "<br> Hola ", $nombre; // La variable con $ no se interpreta entre " y ".
            echo "<br> Hola ", strtoupper($nombre);
            echo "<br>", phpversion(); // Mostrar la versión.
            //echo "<br>", phpinfo(); // Mostrar información del php
            echo "<br> Hoy es: ", date("d-m-Y H:i:s");
            
        ?>
    </h3>

</body>
</html>