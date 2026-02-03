<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="{{ asset('css/style-login.css') }}">
        
    </head>

    <body>

        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow p-5 login-card">

                <h2 class="text-center mb-4" id="form-title">Iniciar Sesión</h2>

                <!-- Errores -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Mensaje de éxito -->
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- LOGIN -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <div class="field-wrapper">
                            <i class="bi bi-envelope-fill field-icon-left"></i>
                            <input type="email" name="email" id="email"
                                class="form-control form-control-lg"
                                value="{{ old('email') }}"
                                required autofocus>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="field-wrapper">
                            <i class="bi bi-lock-fill field-icon-left"></i>
                            <input type="password" name="password" id="password"
                                class="form-control form-control-lg"
                                required>
                            <button type="button" class="toggle-password" onclick="togglePassword('password', 'toggleIconLogin')">
                                <i id="toggleIconLogin" class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                    </div>
                </form>

                <!-- Registro -->
                <div class="text-center mt-4" id="link-registro">
                    <small>¿No tienes cuenta?
                        <a href="{{ route('register') }}">Regístrate aquí</a>
                    </small>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/toggle-password.js') }}"></script>



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
