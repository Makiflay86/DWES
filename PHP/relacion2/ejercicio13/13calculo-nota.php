<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 13 - Cálculo nota</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <section class="container text-center border border-warning rounded shadow mt-5 p-5 col-4">
        <p>
            <?php
                $nota1 = intval($_GET['nota1']);
                $nota2 = intval($_GET['nota2']);
                $nombre = $_GET['nombre'];
                $correo = $_GET['correo'];
                $falta = intval($_GET['falta']);

                $notaFinal = (($nota1 + $nota2) / 2) - (0.25 * $falta);

                switch ($notaFinal)
                {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                        $color = "text-bg-danger";
                        break;
                    case 5:
                    case 6:
                        $color = "text-bg-warning";
                        break;
                    case 7:
                    case 8:
                        $color = "text-bg-success-emphasis";
                        break;
                    case 9:
                    case 10:
                        $color = "text-bg-success";
                        break;
                }

                echo "La nota final de '", $nombre, "' es un: ", $notaFinal;
            ?>
        </p>

        <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="<?php echo $notaFinal * 10; ?>" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar <?php echo $color; ?>" style="width: <?php echo $notaFinal * 10; ?>%"><?php echo $notaFinal; ?></div>
        </div>

    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>
