<?php

include "establecer-sesion.php";


/* NO FUNCIONA, CREO QUE NO ES ASÍ */
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Comprobar si el token CSRF enviado en el formulario coincide con el token almacenado en la sesión
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) 
    {
        $_SESSION['error'] = "TOKEN correcto.";
        header("Location:./index.php");

    } else 
    {
        $_SESSION['error'] = "TOKEN incorrecto.";
        header("Location:./index.php");
    }
}


if (isset($_REQUEST["login_email"]) && isset($_REQUEST["login_password"])) /* Esta comprobación es insegura */
{
    /* ******Habría que comprobar CSRF token para dejar pasar a la aplicación****** */
    


    /* Inicialización de parámetros de conexión */
    $host = "localhost";
    $usuario = "root"; /* Inseguro ********** */
    $password = ""; /* Inseguro ********** */
    $baseDatos = "login-php";


    /* Estableciendo conexión */
    $mysqli = new mysqli($host, $usuario, $password, $baseDatos);


    if ($mysqli->connect_error)
    {
        /* die("Error de conexión: " . $mysqli->connect_errno); */
        $_SESSION['error'] = "No se puede comprobar usuario, vuelva a intentarlo en unos minutos.";
        header("Location:./index.php");
    }

    /* Habría que comprobar si hubo un intento de XSS y contestar con un mensaje de error reprobatorio */
    $usuario = htmlspecialchars($_REQUEST["login_email"]);
    $password = htmlspecialchars($_REQUEST["login_password"]);


    $querySQL = "SELECT * FROM usuarios WHERE idusuario = '$usuario'"; /* OJO con las comillas, que es muy exquisito */
    $resultado = $mysqli->query($querySQL);
    

    if ($resultado->num_rows == 0) /* El usuario no existe */
    {
        $_SESSION['error'] = "Usuario incorrecto.";
        header("Location:./index.php");

    } else /* El usuario ha sido encontrado */
    {
        $row = mysqli_fetch_object($resultado); /* Trata la fila como un objeto */

        /* Ahora hay que ver si la password introducida coincide */
        /* ***El objeto $row es la cadena StdClass*** */

        if ($row ->password == $password) /* La contraseña es correcta */
        {
            /* Cojo todos los datos de este usuario y los paso como variable de sesión */
            $_SESSION['nombre'] = $row->nombre;
            $_SESSION['apellidos'] = $row->apellidos;
            header("Location:./inicio.php"); /* Entra en la applicación */

        } else /* La contraseña es incorrecta */
        {
            $_SESSION['error'] = "Contraseña incorrecta.";
            header("Location:./index.php");
        }


        /* Libera la conexión con la base de datos (bbdd) */
        $mysqli->close();
    }



} else 
{
    $_SESSION['error'] = "Debes de hacer login para acceder.";
    header("Location:./index.php");
}




/* 
TAREAS:
    1. Generación de TOKEN CRSF y comprobación antes de dejar pasar
    (autentificación antes de mandar a inicio), hay que pasarlo desde
    el formulario de inicio de manera oculta. Al llegar a autentificación,
    en vez de preguntar si tenemos nombre de usuario (isset) hay
    que comparar ese TOKEN.
    
    2. Eliminar explicitamente la cookie de sesión al destruir la
    sesión.

    3. Buscar donde se modifican los parámetros de configuración de
    php.ini
*/