<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 10 - Formulario</title>
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
        <form id="form1" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <h3 class="text-center  text-info-emphasis">Texto al revés</h3>
            
            <div class="mb-3">
                <label class="form-label" for="texto">Introduce el texto: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="¿Lo has escrito bien?" name="texto" id="texto">
                <div id="textoHelp" class="form-text text-danger">Escribe un texto válido.</div>
            </div>
            
            <input class="form-control btn btn-primary" type="submit" value="Enviar">
        </form>

        <div class="text-center my-5">
            <?php
                if (isset($_POST["texto"]))
                {
                    $texto = $_POST["texto"];
                    echo "<h4>Texto original</h4>";
                    echo "<p>$texto</p>";
                    
                    $texto_al_reves = strrev($texto);
                    echo "<h4>Texto al revés</h4>";
                    echo "<p>$texto_al_reves</p>";
                }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>