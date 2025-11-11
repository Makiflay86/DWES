<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 13 - Formulario</title>
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
            <h3 class="text-center  text-info-emphasis">Manejo de los alerts de bootstrap</h3>
            
            <div class="mb-3">
                <label class="form-label" for="texto">Introduce un texto: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Escribe aquí su textico" name="texto" id="texto">
                <div id="textoHelp" class="form-text text-danger">Escribe un texto válido.</div>
            </div>
            
            <input class="form-control btn btn-primary" type="submit" value="Enviar">
        </form>

        <div class="text-center my-5">
            <?php
                if (isset($_POST["texto"]))
                {
                    $texto = $_POST["texto"];

                    /* Mostrar el texto invertido */
                    $texto_invertido = strrev($texto);
                    $palindroma = "No";
                    if ($texto_invertido == $texto)
                    {
                        $palindroma = "Si";
                    }
                    echo    '<div class="alert alert-primary my-3" role="alert">',
                                "<h4>Texto Original</h4>", $texto,
                                "<br><br><h4>Texto Invertido</h4>", $texto_invertido,
                                "<br><br>¿Es palíndroma? -> ", $palindroma,
                            '</div>';


                    /* Mostrar el texto invertido pero solo las palabras */
                    $array_texto = explode(" ", $texto);
                    $palabra_texto_invertido = "";
                    foreach ($array_texto as $palabra)
                    {
                        $palabra = strrev($palabra);
                        $palabra_texto_invertido .= "$palabra ";
                    }
                    
                    echo    '<div class="alert alert-secondary my-3" role="alert">',
                                "<h4>Texto Original</h4>", $texto,
                                "<br><br><h4>Palabra del Texto Invertido</h4>", $palabra_texto_invertido,
                            '</div>';


                    /* Mostrar el texto todo en mayúsculas y en minúsculas */
                    $texto_mayuscula = strtoupper($texto);
                    $texto_minuscula = strtolower($texto);
                    echo    '<div class="alert alert-danger my-3" role="alert">',
                                "<h4>Texto Original</h4>", $texto,
                                "<br><br><h4>Mayúsculas</h4>", $texto_mayuscula,
                                "<br><br><h4>Minúsculas</h4>", $texto_minuscula,
                            '</div>';
                    

                    /* Mostrar el texto el número de carácteres y el número de palabras */
                    $caracteres = strlen($texto);
                    $num_palabras = str_word_count($texto);
                    echo    '<div class="alert alert-warning my-3" role="alert">',
                                "<h4>Texto Original</h4>", $texto,
                                "<br><br><h4>Carácteres (con los espacios)</h4>", $caracteres,
                                "<br><br><h4>Nº Palabras</h4>", $num_palabras,
                            '</div>';
                    
                    
                    /* Mostrar el texto con crypt, md5 y sha1 */
                    $crypt = crypt($texto, PASSWORD_BCRYPT);
                    $md5 = md5($texto);
                    $sh1 = sha1($texto);
                    echo    '<div class="alert alert-success my-3" role="alert">',
                                "<h4>Texto Original</h4>", $texto,
                                "<br><br><h4>crypt</h4>", $crypt,
                                "<br><br><h4>md5</h4>", $md5,
                                "<br><br><h4>sh1</h4>", $sh1,
                            '</div>';
                }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>