<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 15 - Formulario</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .form-text 
        {
            visibility: hidden;
        }
    </style>
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 mb-3 p-5 col-4">
        <form id="form1" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h3 class="text-center  text-info-emphasis pb-3">Funciones anónimas Flecha</h3>
            
            <div class="mb-3">
                <label class="form-label" for="texto">Introduce el radio del círculo (positivo): <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Escribe aquí el radio" name="texto" id="texto">
                <div id="textoHelp" class="form-text text-danger">Escribe un radio válido, tiene que ser un número positivo.</div>
            </div>
            
            <input class="form-control btn btn-primary" type="submit" value="Enviar">
        </form>

        <div class="text-center my-5">
            <?php
                if (isset($_POST["texto"]))
                {
                    $radio = $_POST["texto"];

                    /* Calcular la longitud de una circunferencia */
                    $circunferencia = fn ($n) => round(2 * M_PI * $n, 2);

                    /* Calcular el área de un círculo */
                    $circulo = fn ($n) => round(M_PI * pow($n, 2), 2);

                    /* Calcular el volumen de una esfera */
                    $esfera = fn ($n) => round((4 * M_PI * pow($n, 3)) / 3, 2);


                    echo "<h3>El radio es: </h3> <p>", $radio, "</p>";
                    echo "<h3>La longitud de la circunferencia es: </h3> <p>", $circunferencia($radio), "</p>";
                    echo "<h3>El área del circulo es: </h3> <p>", $circulo($radio), "</p>";
                    echo "<h3>El volumen de la esfera es: </h3> <p>", $esfera($radio), "</p>";
                }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>