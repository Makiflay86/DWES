<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 11 - Formulario</title>
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
            <h3 class="text-center  text-info-emphasis">Texto en arrays</h3>
            
            <div class="mb-3">
                <label class="form-label" for="texto">Introduce el texto: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Aquí va el texto" name="texto" id="texto">
                <div id="textoHelp" class="form-text text-danger">Escribe un texto válido.</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="texto2">Introduce otro texto: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Aquí va el otro texto" name="texto2" id="texto2">
                <div id="texto2Help" class="form-text text-danger">Escribe un texto válido.</div>
            </div>
            
            <input class="form-control btn btn-primary" type="submit" value="Enviar">
        </form>

        <div class="text-center my-5">
            <?php
                if (isset($_POST["texto"]) || isset($_POST["texto2"]))
                {
                    $texto1 = $_POST["texto"];
                    $texto2 = $_POST["texto2"];

                    $array1 = explode(" ", $texto1);
                    $array2 = explode(" ", $texto2);

                    
                    echo "<h4>Texto 1 - Array1</h4>";
                    for ($i = 0; $i < count($array1); $i++)
                    {
                        echo "$array1[$i] ";
                    }

                    echo "<br><br>";

                    echo "<h4>Texto 2 - Array2</h4>";
                    for ($i = 0; $i < count($array2); $i++)
                    {
                        echo "$array2[$i] ";
                    }

                    echo "<br><br>";

                    echo "<h4>Los dos arrays juntos</h4>";
                    $array3 = array_merge($array1, $array2);

                    for ($i = 0; $i < count($array3); $i++)
                    {
                        echo "$array3[$i] ";
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