<?php
    // views/login.php
    if (session_status() === PHP_SESSION_NONE) { session_start(); }


    // 1. Si no existe BASE_URL, significa que han entrado directo a la carpeta views
    if (!defined('BASE_URL')) {
        // Redirigimos al index real en la raíz
        $_SESSION['error'] = "Acceso directo no permitido.";
        header("Location: ../index.php?action=login");
        exit();
    }


    // 2. Generar el token CSRF si no existe (para que el formulario pueda usarlo)
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(64));
    }
    

    if (isset($_SESSION['usuario_logueado'])) // si el usuario estuviera ya logeado, lo derivamos al inicio interno
    {  
        header("Location: index.php?action=index"); // nosotros haremos comprobación de token
        exit();
    }
?>

<!doctype html>
<html lang="es-ES">
    <head>
        <title>Iniciar Sesión o Registro | Agencia S.L</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="description" content="Accede a tu cuenta o regístrate para empezar a usar la aplicación. Inicio de sesión seguro y rápido." />
        <meta name="keywords" content="login, registro, formulario, acceso, cuenta, seguridad, iniciar sesión" />
        <meta name="author" content="Francisco Aybar Romero" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="theme-color" content="#343a40" />
        <meta property="og:locale" content="es_ES" />

        <meta property="og:title" content="Iniciar Sesión | Tu Aplicación" />
        <meta property="og:description" content="Accede a tu cuenta o regístrate en la plataforma." />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="./views/img/favicon2.ico" /> 
        <meta property="og:url" content="./index.php" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Iniciar Sesión | Tu Aplicación" />
        <meta name="twitter:description" content="Accede a tu cuenta o regístrate en la plataforma." />
        <meta name="twitter:image" content="./views/img/favicon2.ico" />

        <link rel="icon" href="<?php echo BASE_URL; ?>views/src/img/favicon2.ico" type="image/x-icon">
        
        <!-- Bootstrap -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- ***** Importamos estilos propios ***** -->
        <link rel="stylesheet" href="./views/src/css/style-login.css">
    </head>

    <body class="bg-light">
        
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow p-5 login-card">  
                <h2 class="text-center mb-4" id="form-title">Iniciar Sesión</h2>
                

                
                <!-- ***** Dark-Mode ***** -->
                <button class="btn btn-secondary position-absolute top-0 end-0 m-3" id="theme-toggle" onclick="toggleTheme()">
                    <i class="bi bi-moon-fill" id="theme-icon"></i> 
                </button>



                <!-- ***** Alert, los errores de la app ***** -->
                <?php
                    if (isset($_SESSION['error'])) 
                    {   
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $_SESSION['error'];
                        echo '</div>';    
                        
                        unset($_SESSION['error']);
                    }
                ?>



                <!-- ***** LOGIN ***** -->
                <div id="login-section">
                    <form id="form1" action="index.php?action=authenticate" method="POST"> 

                        <!-- Generar token csrf -->
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                        <!-- Correo electrónico -->
                        <div class="mb-3">
                            <label for="login_email" class="form-label">Correo electrónico</label>
                            <div class="field-wrapper">
                                <i class="bi bi-envelope-fill field-icon-left"></i>
                                <input type="text" class="form-control form-control-lg" id="login_email" name="login_email" placeholder="ejemplo@email.com">
                            </div>
                            <div id="login_emailHelp" class="form-text text-danger"></div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="login_password" class="form-label">Contraseña</label>
                            <div class="field-wrapper">
                                <i class="bi bi-lock-fill field-icon-left"></i>
                                <input type="password" class="form-control form-control-lg" id="login_password" name="login_password" placeholder="********">
                                <button type="button" class="toggle-password" onclick="togglePassword('login_password', 'toggleIconLogin')">
                                    <i id="toggleIconLogin" class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <div id="login_passwordHelp" class="form-text text-danger"></div>
                        </div>

                        <!-- Botón submit -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                        </div>
                    </form>

                    <!-- Si no tienes cuenta, ir a registrarse -->
                    <div class="text-center mt-4" id="link-registro">
                        <small>¿No tienes cuenta? 
                            <a href="#" onclick="showSection('register-section'); return false;">Regístrate aquí</a>
                        </small>
                    </div>
                </div> 
                


                <!-- ***** Sign_up ***** -->
                <div id="register-section">
                    <form id="form2" action="#" method="POST">

                        <!-- Generar token csrf -->
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="register_name" class="form-label">Nombre</label>
                            <div class="field-wrapper">
                                <i class="bi bi-person-fill field-icon-left"></i>
                                <input type="text" class="form-control form-control-lg" id="register_name" name="register_name" placeholder="Tu nombre">
                            </div>
                            <div id="register_nameHelp" class="form-text text-danger">El nombre es obligatorio.</div>
                        </div>

                        <!-- Correo electrónico -->
                        <div class="mb-3">
                            <label for="register_email" class="form-label">Correo electrónico</label>
                            <div class="field-wrapper">
                                <i class="bi bi-envelope-fill field-icon-left"></i>
                                <input type="email" class="form-control form-control-lg" id="register_email" name="register_email" placeholder="ejemplo@email.com" required>
                            </div>
                            <div id="register_emailHelp" class="form-text text-danger">El correo electrónico es obligatorio.</div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="register_password" class="form-label">Contraseña</label>
                            <div class="field-wrapper">
                                <i class="bi bi-lock-fill field-icon-left"></i>
                                <input type="password" class="form-control form-control-lg" id="register_password" name="register_password" placeholder="********" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('register_password', 'toggleIconReg')">
                                    <i id="toggleIconReg" class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <div id="register_passwordHelp" class="form-text text-danger">La contraseña es obligatorio.</div>
                        </div>

                        <!-- Repetir contraseña -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                            <div class="field-wrapper">
                                <i class="bi bi-key-fill field-icon-left"></i>
                                <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="********" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('confirm_password', 'toggleIconConf')">
                                    <i id="toggleIconConf" class="bi bi-eye-fill"></i>
                                </button>
                            </div>
                            <div id="confirm_passwordHelp" class="form-text text-danger">La confirmación de contraseña es obligatorio.</div>
                        </div>

                        <!-- Botón submit -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Registrarse</button>
                        </div>
                    </form>

                    <!-- Si ya tienes cuenta, ir a logearte -->
                    <div class="text-center mt-4" id="link-login">
                        <small>¿Ya tienes cuenta? 
                            <a href="#" onclick="showSection('login-section'); return false;">Inicia Sesión</a>
                        </small>
                    </div>

                </div> 
            </div>
        </div>



        <!-- ***** Importamos scripts propios ***** -->
        <script src="views/src/js/toggle-password.js"></script>
        <script src="views/src/js/show-section.js"></script>
        <script src="views/src/js/dark-mode.js"></script>
        <script src="views/src/js/validaciones.js"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>