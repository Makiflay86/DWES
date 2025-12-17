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
            /* Validamos el CSRF */
            if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) 
            {
                $_SESSION['error'] = "Error de seguridad CSRF.";
                header("Location: index.php?action=login");
                exit();
            }

            $idusuario = $_POST['login_email'];
            $password = $_POST['login_password'];
            
            $user = $this->userModel->login($idusuario, $password);
            if ($user) 
            {
                // Autenticación exitosa, iniciar sesión y redirigir al enrutador para que éste envíe al dashboard-inicio
                $_SESSION['idusuario'] = $idusuario;
                $_SESSION['nombre_usuario'] = $user['nombre'];
                $_SESSION['apellidos_usuario'] = $user['apellidos'];
                $_SESSION['usuario_logueado'] = true;
                header('Location: index.php?action=dashboard');
                exit();

            } else 
            {
                // Autenticación fallida, recargar login con error que mostraría mensaje
                $_SESSION['error'] = "Usuario o contraseña incorrectos.";
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
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }
}