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

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body 
        { 
            background-color: #f8f9fa; 
        }
        
        .dashboard-card 
        { 
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
        }

        .btn-danger 
        {
            border: 1px solid rgba(0, 0, 0, 0.4); 
        }

        /* Mejora la visibilidad del texto sobre el fondo animado */
        .navbar-fondo .navbar-brand, 
        .navbar-fondo .navbar-text, 
        .navbar-fondo .nav-link 
        {
            color: #ffffff !important; /* Fuerza el blanco */
            text-shadow: 0px 1px 4px rgba(0, 0, 0, 0.8); /* Crea un contorno oscuro */
        }

        .navbar-fondo 
        {
            /* Fondo con degradado de múltiples colores. 
            '135deg' define la dirección diagonal del degradado. */
            background: linear-gradient(
                135deg,
                #8e44ad, /* púrpura profundo */
                #e91e63, /* magenta intenso */
                #009688, /* turquesa/teal */
                #1c1c1c, /* negro/gris oscuro */
                #64b5f6, /* azul claro */
                #f8bbd0  /* rosa claro */
        );
            
            /* Duplica el tamaño del fondo para permitir el movimiento de la animación
            sin que se vean los bordes o cortes bruscos. */
            background-size: 400% 400%;
            
            /* Aplica la animación 'fondoMovimiento'.
            20s: Duración de la animación (movimiento lento y sutil).
            ease: Velocidad de interpolación suave.
            infinite: Repite la animación indefinidamente. */
            animation: fondoMovimiento 20s ease infinite;
        }

        /* Define la secuencia de la animación del fondo */
        @keyframes fondoMovimiento 
        {
            /* Inicio: Muestra la primera mitad del fondo ampliado */
            0% { background-position: 0% 50%; }
            /* Mitad: Se desplaza hacia la derecha (100% en X) */
            50% { background-position: 100% 50%; }
            /* Fin: Vuelve a la posición inicial (0% en X) */
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 navbar-fondo">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="ms-auto">
                <span class="navbar-text me-3">
                    Hola, <strong><?php echo $_SESSION['nombre_usuario']; ?></strong>
                </span>
                <a href="index.php?action=logout" class="btn btn-danger btn-sm">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dashboard-card p-5 text-center bg-white">
                    <div class="card-body">
                        <h2 class="display-5 mb-4">
                            Bienvenido, <?php echo $_SESSION['nombre_usuario'] . " " . $_SESSION['apellidos_usuario']; ?>
                        </h2>
                        <p class="lead text-muted">
                            Has iniciado sesión correctamente en el sistema.
                        </p>
                        <hr class="my-4">
                        <p>Tu identificador de acceso es: <strong><?php echo $_SESSION['idusuario']; ?></strong></p>
                        <!-- <div class="mt-4">
                            <button class="btn btn-primary px-4">Ir a mi Perfil</button>
                            <button class="btn btn-secondary px-4">Configuración</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<!-- <html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h2>Bienvenido al Dashboard, <?php echo $_SESSION['idusuario'] ?></h2>
    <p>Has iniciado sesión correctamente</p>
    <a href="index.php?action=logout">Cerrar sesión (Volver al login)</a>
</body>

</html> -->