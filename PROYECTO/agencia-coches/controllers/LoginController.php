<?php
// controllers/LoginController.php

class LoginController {
    private $userModel;

    public function __construct() {
        // Asegúrate de que el modelo Usuario esté cargado en index.php
        $this->userModel = new Usuario();
    }

    public function login() {
        /* Si ya está logueado, lo mandamos al listado de coches directamente */
        if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] === true) {
            header("Location: index.php?action=index");
            exit();
        }

        /* Si no está logueado, cargamos la vista del formulario */
        include 'views/login.php';
    }

    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // --- Lógica de intentos de login ---
            if (!isset($_SESSION['login_attempts'])) {
                $_SESSION['login_attempts'] = 0;
            }

            $cooldown = 300; // 5 minutos
            $minutos = $cooldown / 60;

            if ($_SESSION['login_attempts'] >= 5) {
                $tiempo_transcurrido = time() - ($_SESSION['lock_time'] ?? 0);
                if ($tiempo_transcurrido < $cooldown) {
                    $restante = $cooldown - $tiempo_transcurrido;
                    $_SESSION['error'] = "<b>Acceso bloqueado</b>.<br> Intenta de nuevo en $restante segundos.";
                    header("Location: index.php?action=login");
                    exit();
                } else {
                    $_SESSION['login_attempts'] = 0;
                    unset($_SESSION['lock_time']);
                } 
            }

            // --- Validación CSRF ---
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $_SESSION['error'] = "Error de seguridad CSRF.";
                header("Location: index.php?action=login");
                exit();
            }

            $idusuario = htmlspecialchars($_POST['login_email']);
            $password = htmlspecialchars($_POST['login_password']);
            
            $user = $this->userModel->login($idusuario, $password);

            if ($user) {
                // ÉXITO: Guardamos datos en sesión
                $_SESSION['idusuario'] = $idusuario;
                $_SESSION['nombre_usuario'] = $user['nombre'];
                $_SESSION['apellidos_usuario'] = $user['apellidos'];
                $_SESSION['usuario_logueado'] = true; // Esta es la variable que chequea el index.php

                $_SESSION['login_attempts'] = 0;
                unset($_SESSION['lock_time']);

                // Redirigimos al listado principal de coches
                header('Location: index.php?action=index');
                exit();

            } else {
                // FALLO: Aumentamos intentos
                $_SESSION['login_attempts']++;
                if ($_SESSION['login_attempts'] >= 5) {
                    $_SESSION['lock_time'] = time();
                    $_SESSION['error'] = "Has superado los intentos. Bloqueado por " . $minutos . " min.";
                } else {
                    $_SESSION['error'] = "Usuario o contraseña incorrectos.";
                }
                header('Location: index.php?action=login');
                exit();
            }
        }
    }

    public function logout() {
        session_unset();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}