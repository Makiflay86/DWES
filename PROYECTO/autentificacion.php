<?php

session_start(); /* Pendiente de hacer segura */


if (isset($_REQUEST["login_email"]) && isset($_REQUEST["login_password"]))
{
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




