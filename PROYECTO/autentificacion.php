<?php

include "establecer-sesion.php";


/* Inicializo el contador de intentos, si llega a >= 5 se bloquea (un rato claro) */
if (!isset($_SESSION['login_attempts'])) 
{
    $_SESSION['login_attempts'] = 0;
}

/* Definir cooldown en segundos (ejemplo: 5 minutos == 300) */
$cooldown = 300;

/* Comprobar si está bloqueado */
if ($_SESSION['login_attempts'] >= 5) 
{
    /* Si ya se guardó el momento del bloqueo */
    if (isset($_SESSION['lock_time'])) 
    {
        if (time() - $_SESSION['lock_time'] < $cooldown) 
        {
            /* Todavía dentro del cooldown */
            $_SESSION['error'] = "<b>Acceso bloqueado.</b><br> Intenta de nuevo en " . ($cooldown - (time() - $_SESSION['lock_time'])) . " segundos.";
            header("Location: ./index.php");
            exit;

        } else 
        {
            /* Cooldown terminado → reiniciamos */
            $_SESSION['login_attempts'] = 0;
            unset($_SESSION['lock_time']);
        }

    } else 
    {
        /* Primera vez que se bloquea -> guardamos timestamp */
        $_SESSION['lock_time'] = time();
        $_SESSION['error'] = "Has superado el número máximo de intentos. Intenta más tarde.";
        header("Location: ./index.php");
        exit;
    }
}



/* Comprobar si el token CSRF enviado en el formulario coincide con el token almacenado en la sesión */
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) 
{
    if (isset($_REQUEST["login_email"]) && isset($_REQUEST["login_password"])) /* Esta comprobación es insegura */
    {
        /* Inicialización de parámetros de conexión */
        $host = "localhost";
        $usuario = "login-php"; /* Inseguro ********** */
        $password = "qwerty123#"; /* Inseguro ********** */
        $baseDatos = "login-php";


        /* Estableciendo conexión */
        $mysqli = new mysqli($host, $usuario, $password, $baseDatos);


        if ($mysqli->connect_error)
        {
            /* die("Error de conexión: " . $mysqli->connect_errno); */
            $_SESSION['error'] = "No se puede comprobar usuario, vuelva a intentarlo en unos minutos.";
            header("Location:./index.php");
            exit;
        }

        /* Habría que comprobar si hubo un intento de XSS y contestar con un mensaje de error reprobatorio */
        $usuario = htmlspecialchars($_REQUEST["login_email"]);
        $password = htmlspecialchars($_REQUEST["login_password"]);


        $querySQL = "SELECT * FROM usuarios WHERE idusuario = '$usuario'"; /* OJO con las comillas, que es muy exquisito */
        $resultado = $mysqli->query($querySQL);
        

        if ($resultado->num_rows == 0) /* El usuario no existe */
        {
            $_SESSION['login_attempts']++;
            $_SESSION['error'] = "Usuario incorrecto.";
            header("Location:./index.php");
            exit;

        } else /* El usuario ha sido encontrado */
        {
            $row = mysqli_fetch_object($resultado); /* Trata la fila como un objeto */

            /* Ahora hay que ver si la password introducida coincide */
            /* ***El objeto $row es de la cadena StdClass*** */

            if ($row ->password == $password) /* La contraseña es correcta */
            {
                $_SESSION['login_attempts'] = 0; /* Reinicia el contador de posibles fallos */
                unset($_SESSION['lock_time']); /* Reinicia el cooldown */

                /* Cojo todos los datos de este usuario y los paso como variable de sesión */
                $_SESSION['nombre'] = $row->nombre;
                $_SESSION['apellidos'] = $row->apellidos;
                header("Location:./inicio.php"); /* Entra en la applicación */
                exit;

            } else /* La contraseña es incorrecta */
            {
                $_SESSION['login_attempts']++;
                $_SESSION['error'] = "Contraseña incorrecta.";
                header("Location:./index.php");
                exit;
            }


            /* Libera la conexión con la base de datos (bbdd) */
            $mysqli->close();
        }



    } else 
    {
        $_SESSION['error'] = "Debes de hacer login para acceder.";
        header("Location:./index.php");
        exit;
    }

} else 
{
    $_SESSION['error'] = "No se puede comprobar usuario, vuelva a intentarlo en unos minutos.";
    header("Location:./index.php");
    exit;
}