<?php


include "establecer-sesion.php";


/* Establecemos todas las $_SESSION a un array vacio es decir a nada */
$_SESSION = [];


/* Destruir las cookies de sesión */
if (isset($_COOKIE[session_name()])) 
{
    $params = session_get_cookie_params();
	setcookie(
        session_name(), 
        '', 
        time() - 1, 
        $params['path'], 
        $params['domain'], 
        $params['secure'], 
        $params['httponly']
    );
}


/* Destroimos la sesión */
session_destroy();


/* Redirigimos al index.php para volver a logearse */
header("Location:./index.php");