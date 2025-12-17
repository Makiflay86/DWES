<?php
// controllers/AuthController.php

class AuthController                                   // la clase AuthController contiene un objeto usuario (el que autentica)
{
    private $userModel;

    public function __construct()                     // aquí lo crea
    {
        $this->userModel = new Usuario();
    }

    public function login()                           // aquí ejecuta el login (en realidad, la vista login)
    {
        /* Si ya está logueado, lo mandamos al dashboard directamente */
        if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] === true) 
        {
            header("Location: index.php?action=dashboard");
            exit();
        }

        /* Si no está logueado, cargamos la vista normal */
        include 'views/login.php';
    }

    public function authenticate()                    // aquí confronta con la base de datos
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            /* Contador de intentos */
            /* Inicializo el contador de intentos, si llega a >= 5 se bloquea (un rato claro) */
            if (!isset($_SESSION['login_attempts'])) 
            {
                $_SESSION['login_attempts'] = 0;
            }

            /* Definir cooldown en segundos (ejemplo: 5 minutos == 300) */
            $cooldown = 300;
            $minutos = $cooldown / 60;

            /* Comprobar si está bloqueado */
            if ($_SESSION['login_attempts'] >= 5) 
            {
                $tiempo_transcurrido = time() - ($_SESSION['lock_time'] ?? 0);
                if ($tiempo_transcurrido < $cooldown) 
                {
                    $restante = $cooldown - $tiempo_transcurrido;
                    $_SESSION['error'] = "<b>Acceo bloqueado</b>.<br> Intenta de nuevo en $restante segundos.";
                    header("Location: index.php?action=login");
                    exit();

                } else 
                {
                    // El tiempo pasó, reseteamos para dejarle intentar
                    $_SESSION['login_attempts'] = 0;
                    unset($_SESSION['lock_time']);
                } 
            }
            


            /* Validamos el CSRF */
            if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) 
            {
                $_SESSION['error'] = "Error de seguridad CSRF.";
                header("Location: index.php?action=login");
                exit();
            }



            $idusuario = htmlspecialchars($_POST['login_email']);
            $password = htmlspecialchars($_POST['login_password']);
            
            $user = $this->userModel->login($idusuario, $password);
            if ($user) 
            {
                // Autenticación exitosa, iniciar sesión y redirigir al enrutador para que éste envíe al dashboard-inicio
                $_SESSION['idusuario'] = $idusuario;
                $_SESSION['nombre_usuario'] = $user['nombre'];
                $_SESSION['apellidos_usuario'] = $user['apellidos'];
                $_SESSION['usuario_logueado'] = true;

                $_SESSION['login_attempts'] = 0;
                unset($_SESSION['lock_time']);

                header('Location: index.php?action=dashboard');
                exit();

            } else 
            {
                // Autenticación fallida, recargar login con error que mostraría mensaje
                $_SESSION['login_attempts']++;
                if ($_SESSION['login_attempts'] >= 5) 
                {
                    $_SESSION['lock_time'] = time();
                    $_SESSION['error'] = "Has superado los intentos. Bloqueado por " . $minutos . " min.";

                } else 
                {
                    $_SESSION['error'] = "Usuario o contraseña incorrectos.";
                }

                /* Lo redirigimos al login */
                header('Location: index.php?action=login');
                exit();
            }
        }
    }

    public function dashboard()
    {
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['idusuario'])) 
        {
            header('Location: index.php?action=login');
            exit();
        }
        // Carga la vista del dashboard (página de bienvenida)
        include 'views/dashboard.php';
    }

    public function logout()
    {
        session_unset();

        /* Borramos las cookies de sesión del navegador */
        if (ini_get("session.use_cookies")) 
        {
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