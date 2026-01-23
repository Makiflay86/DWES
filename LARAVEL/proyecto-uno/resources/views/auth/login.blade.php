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

        <style> .toggle-password-btn { border: none; background: transparent; } </style>
        <style>
            body {
                font-size: 1.15rem; /* Aumenta tamaño general del texto */
            }

            #login-card {
                max-width: 520px; /* Más ancho */
                padding: 2.5rem !important; /* Más espacio interno */
                transform: scale(1.05); /* Sutil ampliación */
            }

            .form-control {
                height: 3rem; /* Inputs más altos */
                font-size: 1.1rem;
            }

            .btn {
                height: 3.2rem; /* Botón más grande */
                font-size: 1.15rem;
            }

            h3 {
                font-size: 2rem; /* Título más grande */
            }

            .toggle-password-btn i {
                font-size: 1.4rem; /* Icono más grande */
            }
        </style>

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

        <script>
            function toggleTheme() 
            {
                const body = document.body;
                const card = document.getElementById('login-card');
                const icon = document.getElementById('theme-icon');
                const toggleIconLogin = document.getElementById("toggleIconLogin");

                body.classList.toggle('bg-dark');
                body.classList.toggle('text-light');

                card.classList.toggle('bg-dark');
                card.classList.toggle('text-light');
                card.classList.toggle('border-light');

                toggleIconLogin.classList.toggle("text-light");

                if (icon.classList.contains('bi-moon-fill')) 
                {
                    icon.classList.replace('bi-moon-fill', 'bi-sun-fill');

                } else 
                {
                    icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                }
            }

            function togglePassword() 
            {
                const input = document.getElementById('password');
                const icon = document.getElementById('toggleIconLogin');

                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";

                icon.classList.toggle("bi-eye-fill", !isPassword);
                icon.classList.toggle("bi-eye-slash-fill", isPassword);
            }
        </script>


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
    </body>
</html>
