<?php
    include "establecer-sesion.php";
?>


<!doctype html>
<html lang="es-ES">
<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="./style.css">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Tipografía de la letra -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="login">
    <div class="container">
        <div class="login-container-wrapper clearfix">
            <ul class="switcher clearfix">
                <li class="first logo active" data-tab="login"> 
                    <a>Iniciar sesión</a> 
                </li>
                <li class="second logo" data-tab="sign_up">
                    <a>Registrarse</a> 
                </li>
                <!-- Aquí se mostrara los errores desde dentro de la aplicación -->
                <?php
                    if (isset($_SESSION['error']))
                    {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $_SESSION['error'];
                        echo '</div>';

                        /* $_SESSION["error"] = ""; contenido vacío, pero la variable sigue "set" */
                        unset($_SESSION['error']);
                    }
                ?>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="login">
                    <!-- Formulario login -->
                    <form id="form1" action="autentificacion.php" method="post" class="form-horizontal login-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                        <div class="form-group relative mb-3">
                            <input class="form-control input-lg" id="login_email" name="login_email" placeholder="Correo electrónico" type="text"> <i class="fa fa-user"></i>
                            <div id="login_emailHelp" class="form-text text-danger">El correo electrónico es obligatorio.</div>
                        </div>
                        <div class="form-group relative mb-3">
                            <input class="form-control input-lg" id="login_password" name="login_password" placeholder="Contraseña" type="password"> <i class="fa fa-lock"></i>
                            <div id="login_passwordHelp" class="form-text text-danger">La contraseña es obligatorio.</div>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success btn-lg btn-block" type="submit">Iniciar sesión</button>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input id="stay-sign" name="stay-sign" type="checkbox">
                            <label for="stay-sign"> Mantener sesión</label>
                        </div>
                        <hr>
                        <div class="text-center">
                            <label><a href="#">¿Olvidaste tu contraseña?</a></label>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="sign_up">
                    <!-- Formulario Sign-Up -->
                    <form id="form2" action="" method="post" class="form-horizontal login-form">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                        
                        <div class="form-group relative mb-3">
                            <input class="form-control input-lg" id="signup_email" name="signup_email" placeholder="Correo electrónico" type="email"> <i class="fa fa-user"></i>
                        </div>
                        <div class="form-group relative mb-3">
                            <input class="form-control input-lg" id="signup_password" name="signup_password" placeholder="Contraseña" type="password"> <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group relative mb-3">
                            <input class="form-control input-lg" id="repeat_password" name="repeat_password" placeholder="Repite la Contraseña" type="password"> <i class="fa fa-lock"></i>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success btn-lg btn-block" type="submit">Registrarse</button>
                        </div>
                        <div class="checkbox checkbox-success">
                            <input id="agree-terms" name="agree-terms" type="checkbox">
                            <label for="agree-terms"> Aceptar los terminos y condiciones</label>
                        </div>
                        <hr>
                        <div class="text-center">
                            <label><a href="#">¿Ya tienes cuenta?</a></label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
    <script src="./script.js"></script>
    <script src="./validaciones.js"></script>

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