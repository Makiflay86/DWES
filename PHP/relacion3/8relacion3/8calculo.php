<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 8 - Cálculo</title>
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
    <section class="container border border-warning rounded shadow mt-5 p-5 col-4">
        <div class="text-center">
            <?php
                $texto = $_POST["texto"];
                $convertir = $_POST["convertir"];


                echo "<h4>Texto original</h4>";
                echo "<p>$texto</p>";


                echo "<h4>Texto convertido</h4>";
                if ($convertir == "mayusculas") 
                {
                    echo "<p>", strtoupper($texto), "</p>";

                } else if ($convertir == "minusculas") 
                {
                    echo "<p>", strtolower($texto), "</p>";

                } else 
                {
                    echo "<p>", strtoupper($texto), "</p>";
                    echo "<p>", strtolower($texto), "</p>";
                } 
            ?>
        </div>

        <div class="mt-5">
            <a href="../8relacion3/8formulario.php"><input type="button" class="btn btn-primary" value="<- Volver"></a>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>