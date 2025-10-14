<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 14 - Calculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
                    $notaFinal = "Sobresaliente.";
                    break;
                case 8: // Si la nota es 8 o 7 entra por aquí
                case 7:
                    $notaFinal = "Notable.";
                    break;
                case 6:
                    $notaFinal = "Bien.";
                    break;
                case 5:
                    $notaFinal = "Suficiente.";
                    break;
                case 4: // Si la nota es 4, 3, 2, 1, 0 entra por aquí
                case 3: 
                case 2: 
                case 1:
                case 0:
                    $notaFinal = "Insuficiente";
                    break;

                default:
                    $notaFinal = "ERROR: La nota esta fuera del rango(0 - 10).";
                    break;
            };
        ?>
    </p>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>