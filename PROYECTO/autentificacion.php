<?php
    session_start(); /* Pendiente de hacer segura */
    
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

    echo "Conexión establecida";