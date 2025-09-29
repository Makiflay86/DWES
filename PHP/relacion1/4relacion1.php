<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio4</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body>
    
    <h1>
        Ejercicio 4
    </h1>
    <h3>
        <?php
        // Para desactivar los warning se puede indicar:
        //error_reporting(E_ALL & ~E_WARNING);
        // ^^ para desactivar los warnings, de momento no lo uso

        // PHP es case-sensitive
        // Las constante se ponen en mayúsculas (por convenio)
        // Si declaro una const no debo usar $ en el nombre

        const SEMANA = ["Lunes", 
                        "Martes", 
                        "Miércoles", 
                        "Jueves", 
                        "Viernes", 
                        "Sábado", 
                        "Domingo"
                        ];

        echo "<br> El primer día de la semana es: ", SEMANA[0];
        echo "<br> Una semana tiene ", count(SEMANA), " días."; // La función que calcular la longitud de un array es count()
        echo "<br>Todos los días de la semana son: "; 
        for($i = 0; $i < count(SEMANA); $i++)
        {
            echo SEMANA[$i], " ";
        };

        echo "<ol>";
        for($i = 0; $i < count(SEMANA); $i++) 
        { 
            echo "<li>", SEMANA[$i], "</li>";
        };
        echo "</ol>";

        ?>
    </h3>

</body>
</html>