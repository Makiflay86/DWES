<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 4 - Ejercicio 1 - Login</title>
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
    <div class="row justify-content-center">
        <section class="container border border-secondary rounded shadow mt-5 mb-3 p-5 col-12 col-md-8 col-lg-6">
            <?php 
                if (!isset($_SESSION["a"]))
                {
                    $_SESSION["a"] = 0;
                }

                if (!isset($_SESSION["b"]))
                {
                    $_SESSION["b"] = 0;
                }

                if (isset($_REQUEST["operacion"]))
                {
                    switch($_REQUEST["operacion"])
                    {
                        case "+a":
                            $_SESSION["a"]++;
                            break;

                        case "-a":
                            $_SESSION["a"]--;
                            break;

                        case "+b":
                            $_SESSION["b"]++;
                            break;

                        case "-b":
                            $_SESSION["b"]--;
                            break;
                        
                        case "ra":
                            $_SESSION["a"] = 0;
                            break;

                        case "rb":
                            $_SESSION["b"] = 0;
                            break;

                        case "ds":
                            /* unset($_SESSION["a"]);
                            unset($_SESSION["b"]); */ /* Esto elimina la variable */
                            $_SESSION["a"] = 0;
                            $_SESSION["b"] = 0;
                            session_destroy();
                            echo ' 
                                <div class="d-flex justify-content-center">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span> 
                                    </div>
                                </div>
                            ';/* EL maravilloso spinner de carga */
                            header("refresh: 5;"); /* Esta esta una opción añadiendo 15 segundos antes del refresh */
                            //header("Location: " . $_SERVER['PHP_SELF']); /* Una opción es poner esto */
                            break;
                    }
                }
            ?>

            <h1>A: <?php echo $_SESSION["a"]; ?></h1>
            <h1>B: <?php echo $_SESSION["b"]; ?></h1>
            
            <hr>
    
            <form id="form1" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="mb-3">
                    <select class="form-select" name="operacion" id="operacion">
                        <option value="+a">Incrementar A</option>
                        <option value="-a">Decrementar A</option>
                        <option value="+b">Incrementar B</option>
                        <option value="-b">Decrementar B</option>
                        <option value="ra">Resetear A</option>
                        <option value="rb">Resetear B</option>
                        <option value="ds">Destruir Sesión</option>
                    </select>
                </div>
                
                <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
            </form>

        </section>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>