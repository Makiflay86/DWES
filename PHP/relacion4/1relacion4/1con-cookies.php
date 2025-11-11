<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 4 - Ejercicio 1 - cookies</title>
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
        <div class="container-fluid w-75">
            <?php 
                function compruebaAcceso($id, $pass) /* Función que comprueba usuario conocido */
                {                                    /* Debería de ir a base de datos */
                    define("USUARIO_CORRECTO", "Ali Baba");
                    define("PASS_CORRECTA", "AbreteSesamo");
                    
                    return ($id == USUARIO_CORRECTO && $pass == PASS_CORRECTA);
                }

                $idusuario = $_POST["idusuario"]; /* Descargo datos de formularios $_POST */
                $password = $_POST["password"];
                unset($_SESSION["errorLogin"]);

                if (compruebaAcceso($idusuario, $password)) /* Si el usuario es conocido */
                {                                           /* Se activa una cookie forever */
                    setcookie("usuario", $idusuario);       /* Solo al recargar, se activa */
                    if (isset($_COOKIE["usuario"]))         /* O al ir a otra de este sitio */
                    {
                        echo "Te llamas ", $_COOKIE["usuario"];
                    }
                    
                    $_SESSION["usuario"] = $idusuario; /* Creo la variable de sesión y está activa */
                    echo "<br>Tu eres ", $_SESSION["usuario"], " según tu variable de sesión."; /* hasta que la destruya */
                                                       /* y se queda almacenada en el SERVIDOR */

                } else 
                {
                    $_SESSION["errorLogin"] = true;
                    header("Location: 1login.php");
                }
            ?>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>