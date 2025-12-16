<?php
    // views/dashboard.php
    /* include "./config/establecer-sesion.php"; */ /* Solo hace falta poner esto en el index.php */

    if (session_status() === PHP_SESSION_NONE) { session_start(); }

    if (!defined('BASE_URL')) 
    { /* Si no se definió BASE_URL, significa que no pasó por index.php */
        $_SESSION['error'] = "Debes de hacer login para entrar";
        header("Location: ../index.php?action=login");
        exit();
    }

    /* Comprobamos que el usuario está logueado  */
    if (!isset($_SESSION['usuario_logueado'])) 
    { /* Si no hay usuario en sesión, redirigimos al login  */
        $_SESSION['error'] = "Debes de hacer login para entrar";
        header("Location: " . BASE_URL . "index.php?action=login");
        exit(); 
    } 

    /* Comprobar que existe el token CSRF  */
    if (empty($_SESSION['csrf_token'])) 
    { /* Si no hay token, algo raro pasa → redirigir */ 
        $_SESSION['error'] = "Debes de hacer login para entrar";
        header("Location: " . BASE_URL . "index.php?action=login");
        exit(); 
    }
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h2>Bienvenido al Dashboard, <?php echo $_SESSION['idusuario'] ?></h2>
    <p>Has iniciado sesión correctamente</p>
    <a href="index.php?action=logout">Cerrar sesión (Volver al login)</a>
</body>

</html>