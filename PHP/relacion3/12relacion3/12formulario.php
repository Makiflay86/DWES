<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 12 - Formulario</title>
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
            <h3 class="text-center  text-info-emphasis">Ordenar array</h3>
            
            <div class="mb-3">
                <label class="form-label" for="texto">Introduce el texto: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Separado por comas (,)" name="texto" id="texto">
                <div id="textoHelp" class="form-text text-danger">Escribe un texto válido.</div>
            </div>
            
            <input class="form-control btn btn-primary" type="submit" value="Enviar">
        </form>

        <div class="text-center my-5">
            <?php
                if (isset($_POST["texto"]))
                {
                    $texto1 = $_POST["texto"];

                    $array1 = explode(",", $texto1);
                    
                    echo "<h4>Texto - Array1</h4>";
                    for ($i = 0; $i < count($array1); $i++)
                    {
                        echo "$array1[$i], ";
                    }

                    echo "<br><br>";

                    echo "<h4>Texto - Ordenado</h4>";
                    natcasesort($array1);

                    foreach ($array1 as $palabra)
                    {
                        echo "$palabra, ";
                    }
                    
                    echo "<br><br>";

                    $datos = ['Pérez','García','López','Márquez','Álvarez','Domínguez','Ruíz','Díaz'];

                    echo "<h4>Texto Ordenado de ejemplo</h4>";
                    natcasesort($datos);

                    foreach ($datos as $palabra)
                    {
                        echo "$palabra, ";
                    }
                }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>