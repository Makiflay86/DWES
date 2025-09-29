<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio2</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body>
    
    <h1>
        Ejercicio 2
    </h1>
    <h3>
        <?php
            $algo = 3.1416; // Obtenido de alguna fuente de datos
            // dos formas de declarar una constante
            const PI = $algo; // El valor puede ser no conocido hasta la ejecución
            define("NOMBRE", "Francisco"); // Modo original
            $booleano = true;
            $nombre = "Francisco";
            $curso = 2;
            $altura = 1.77;
            $claro = "azul";
            // Declaración de variable indirecta
            $$color = $claro;

            echo "Boolean: ", $booleano;
            echo " - String: ", $nombre;
            echo " - Int: ", $curso;
            echo " - Float: ", $altura;

            echo "<br>";

            echo var_dump($nombre);
            printf("<br> En binario, la variable curso vale %b.", $curso);
            printf("<br> El carácter ASCII que corresponde a 64 es: %c", 64);
            printf("<br> Un valor real en notación científica se puede expresar %E", $altura);
        ?>
    </h3>

</body>
</html>