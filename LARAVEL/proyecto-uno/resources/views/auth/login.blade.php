<!doctype html>
<html lang="es-ES">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <!-- Bootstrap ICON v1.13.1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">
    </head>

    <body>
        
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card p-4 shadow-lg" id="login-card" style="max-width: 420px; width: 100%;">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mx-auto">Iniciar Sesión</h3>

                    <!-- Botón Dark Mode -->
                    <button class="btn btn-outline-secondary" id="theme-toggle" onclick="toggleTheme()">
                        <i class="bi bi-moon-fill" id="theme-icon"></i>
                    </button>
                </div>

                <form id="form" action="/login" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="email@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>

                        <div class="input-group">
                            <input id="password" type="password" name="password" class="form-control" placeholder="********" required>

                            <button type="button" class="toggle-password-btn" onclick="togglePassword()">
                                <i id="toggleIconLogin" class="bi bi-eye-fill fs-5"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Acceder</button>
                </form>

                <div class="text-center mt-3">
                    <small>¿No tienes cuenta? <a href="/register">Regístrate aquí</a></small>
                </div>

            </div>
        </div>


        <!-- Bootstrap JavaScript Libraries -->
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

        <!-- Scripts necesarios -->
        <script src="{{ asset('js/togglePassword.js') }}"></script>
        <script src="{{ asset('js/toggleTheme.js') }}"></script>
    </body>
</html>
