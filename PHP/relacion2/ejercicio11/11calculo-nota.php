<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 11 - Calculo nota</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <p class="container text-center border border-warning rounded shadow mt-5 p-5 col-4">
        <?php
            $nota1 = $_GET['nota1'];
            $nota2 = $_GET['nota2'];
            $nota3 = $_GET['nota3'];
            $notaFinal = ($nota1 + $nota2 + $nota3) / 3;

            switch ($notaFinal)
            {
                case 1:
                case 2:
                case 3:
                case 4:
                    echo "<b>Suspenso</b>, tu nota final es un: ", $notaFinal;        
                    break;
                case 5:
                    echo "<b>Suficiente</b>, tu nota final es un: ", $notaFinal;        
                    break;
                case 6:
                    echo "<b>Bien</b>, tu nota final es un: ", $notaFinal;        
                    break;
                case 7:
                case 8:
                    echo "<b>Notable</b>, tu nota final es un: ", $notaFinal;        
                    break;
                case 9:
                    echo "<b>Sobresaliente</b>, tu nota final es un: ", $notaFinal;        
                    break;
                case 10:
                    echo "<b>Matrícula de honor</b>, tu nota final es un: ", $notaFinal;        
                    break;
            }
        ?>
    </p>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>