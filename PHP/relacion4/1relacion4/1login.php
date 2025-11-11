<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 4 - Ejercicio 1 - Login</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .form-text 
        {
            visibility: hidden;
        }
    </style>
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 mb-3 p-5 col-4">
        <form id="form1" method="post" action="<?php echo htmlspecialchars('1con-cookies.php'); ?>">

            <div class="mb-3">
                <label class="form-label" for="idusuario">Identificador: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Escribe aquí su identificación" name="idusuario" id="idusuario">
                <div id="idusuarioHelp" class="form-text text-danger">Escribe un Identificador válido.</div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">Contraseña: <span class="text-danger"> *</span></label>
                <div class="input-group">
                    <input class="form-control" type="password" placeholder="Escribe aquí su contraseña" name="password" id="password">
                    <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                        👁️
                    </button>
                </div>
                <div id="passwordHelp" class="form-text text-danger">Escribe una contraseña válida.</div>
            </div>
            
            <input type="submit" class="btn btn-primary" value="Iniciar sesión">
        </form>

        <?php 
            if (isset($_SESSION["errorLogin"]))
            {
                echo '
                <div class="pt-5">
                    <div class="alert alert-danger" role="alert">
                        * Usuario o contraseña incorrecto.
                    </div>
                </div>
                ';
            }
        ?>
    </section>
    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>