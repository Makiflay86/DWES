<?php
// views/dashboard.php
session_start();        // habría que comprobar que hay token de sesion
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h2>Bienvenido al Dashboard, <?php echo $_SESSION['idusuario'] ?></h2>
    <p>Has iniciado sesión correctamente</p>
    <a href="index.php?action=login">Cerrar sesión (Volver al login)</a>
</body>

</html>