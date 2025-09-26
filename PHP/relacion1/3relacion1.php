<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio3</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body>

    <h1>
        Ejercicio 3
    </h1>

    <?php
        echo '<h2>Valores de $_SERVER</h2>';
        echo "<ul>";
        echo "<li>DOCUMENT_ROOT: ", $_SERVER["DOCUMENT_ROOT"], "</li>";
        echo "<li>PHP_SELF: ", $_SERVER["PHP_SELF"], "</li>";
        echo "<li>SERVER_NAME: ", $_SERVER["SERVER_NAME"], "</li>";
        echo "<li>SERVER_SOFTWARE: ", $_SERVER["SERVER_SOFTWARE"], "</li>";
        echo "<li>SERVER_PROTOCOL: ", $_SERVER["SERVER_PROTOCOL"], "</li>";
        echo "<li>HTTP_HOST: ", $_SERVER["HTTP_HOST"], "</li>";
        echo "<li>HTTP_USER_AGENT: ", $_SERVER["HTTP_USER_AGENT"], "</li>";
        echo "<li>REMOTE_ADDR: ", $_SERVER["REMOTE_ADDR"], "</li>";
        echo "<li>REMOTE_PORT: ", $_SERVER["REMOTE_PORT"], "</li>";
        echo "<li>SCRIPT_FILENAME: ", $_SERVER["SCRIPT_FILENAME"], "</li>";
        echo "<li>REQUEST_URI: ", $_SERVER["REQUEST_URI"], "</li>";
        echo "</ul>";

        echo '<h2>Volcado con var_dump($_SERVER):</h2>';
        echo "<p>", var_dump($_SERVER), "</p>";
        
        echo '<h2>Volcado con print_r($_SERVER):</h2>';
        echo "<p>", print_r($_SERVER), "</p>";   
       
    ?>

    <!-- Explicación -->
     <br><br><br>
     <h2>
        Explicación
     </h2>
    <?php
        echo "<h3>Mostrando con var_dump</h3>";
        echo var_dump($_SERVER['DOCUMENT_ROOT']);
        
        echo "<h3>Mostrando con print_r()</h3>";
        echo print_r($_SERVER['DOCUMENT_ROOT']);

        echo "<br>Para saber el tipo de una variable con gettype(): ", gettype($_SERVER['DOCUMENT_ROOT']);

        echo "<h3>Mostrando con echo</h3>";
        echo "DOCUMENT_ROOT: ", $_SERVER['DOCUMENT_ROOT'], "<br>";
        
        echo "<h3>Mostrando con foreach</h3>";
        foreach ($_SERVER as $clave => $valor) 
        {
            print "$clave : $valor <br>";
        }



    ?>

</body>
</html>