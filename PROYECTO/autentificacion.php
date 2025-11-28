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
    
        /* nos queda: 
            - hacer la query
            - redireccionar a index si no está o la contraseña es erróne
            - redireccionar a inicio.php si todo es correcto 
        */

        $querySQL = "SELECT * FROM usuarios WHERE idusuario = '$usuario'"; /* OJO con las comillas, que es muy exquisito */
        $resultado = $mysqli->query($querySQL);
        
        if ($resultado->num_rows == 0) /* El usuario no existe */
        {
            $_SESSION['error'] = "Usuario incorrecto.";
            header("Location:./index.php");

        } else /* El usuario ha sido encontrado */
        {
            $_SESSION['error'] = "Usuario reconocido."; /* Esto es para testear hay que comprobar la password */
            header("Location:./index.php");
        }



    } else 
    {
        $_SESSION['error'] = "Debes de hacer login para acceder.";
        header("Location:./index.php");
    }




