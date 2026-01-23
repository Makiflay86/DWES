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
    </head>

    <body>
        
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card p-5 shadow" id="login-card">
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="m-0">Iniciar Sesión</h2>

                    <!-- Botón Dark Mode -->
                    <button class="btn btn-secondary" id="theme-toggle" onclick="toggleTheme()">
                        <i class="bi bi-moon-fill" id="theme-icon"></i>
                    </button>
                </div>

                <form id="form" action="/login" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" placeholder="email@email.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="********">
                        <button type="button" class="toggle-password" onclick="togglePassword('password', 'toggleIconLogin')">
                            <i id="toggleIconLogin" class="bi bi-eye-fill"></i>
                        </button>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Acceder</button>
                </form>

                <div class="text-center mt-4" id="link-registro">
                    <small>
                        ¿No tienes cuenta? 
                        <a href="/register">Regístrate aquí</a>
                    </small>
                </div>
            </div>
        </div>

        <script>
            function toggleTheme() {
                const body = document.body;
                const card = document.getElementById('login-card');
                const icon = document.getElementById('theme-icon');

                body.classList.toggle('bg-dark');
                body.classList.toggle('text-light');

                card.classList.toggle('bg-dark');
                card.classList.toggle('text-light');
                card.classList.toggle('border-light');

                if (icon.classList.contains('bi-moon-fill')) {
                    icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                } else {
                    icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                }
            }

            function togglePassword(inputId, iconId) 
            {
                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);

                if (input.type === "password") 
                {
                    input.type = "text";
                    icon.classList.remove("bi-eye-fill");
                    icon.classList.add("bi-eye-slash-fill");

                } else 
                {
                    input.type = "password";
                    icon.classList.remove("bi-eye-slash-fill");
                    icon.classList.add("bi-eye-fill");
                }
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
