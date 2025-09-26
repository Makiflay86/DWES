<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 1 - Ejercicio13</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
</head>
<body style="text-align: center;">
    <h1>
        Calificaciones a partir de un número entero (switch)
    </h1>
    <p>
        <?php
            $nota = 10;
            
            switch ($nota) 
            {
                case 10: // Si la nota es 10 o 9 entra por aquí
                case 9:
                    echo "Nota final: Sobresaliente.";
                    break;
                case 8: // Si la nota es 8 o 7 entra por aquí
                case 7:
                    echo "Nota final: Notable.";
                    break;
                case 6:
                    echo "Nota final: Bien.";
                    break;
                case 5:
                    echo "Nota final: Suficiente.";
                    break;
                case 4: // Si la nota es 4, 3, 2, 1, 0 entra por aquí
                case 3: 
                case 2: 
                case 1:
                case 0:
                    echo "Nota final: Insuficiente.";
                    break;

                default:
                    echo "ERROR: La nota esta fuera del rango(0 - 10).";
                    break;
            };
        ?>
    </p>
</body>
</html>