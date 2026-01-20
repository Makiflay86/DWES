<?php
// 1. Carga de configuraciones y modelos de seguridad
require_once 'config/config.php';
require_once 'models/Usuario.php';
include "./config/establecer-sesion.php"; // Esto suele contener session_start()

// 2. Inclusión de controladores
require_once 'controllers/LoginController.php';
require_once 'controllers/CocheController.php';

// 3. Instancia de controladores
$auth = new LoginController();
$coche = new CocheController();

// 4. Determinamos la acción
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';

// 5. Verificación de sesión (Ajusta 'usuario' según lo que guardes en tu AuthController)
$isLoggedIn = isset($_SESSION['usuario_logueado']) || isset($_SESSION['usuario_logueado']);

if (!$isLoggedIn) {
    // RUTA PARA USUARIOS NO LOGUEADOS
    switch ($action) {
        case 'authenticate':
            $auth->authenticate();
            break;
        case 'register';
            $auth->register();
            break;
        case 'login':
        default:
            $auth->login();
            break;
    }
} else {
    // RUTA PARA USUARIOS AUTENTICADOS
    switch ($action) {
        case 'dashboard':
        case 'index':
            $coche->index();
            break;
        case 'create':
            $coche->create();
            break;
        case 'edit':
            $coche->edit();
            break;
        case 'delete':
            $coche->delete();
            break;
        case 'getGaleriaJson':
            $coche->getGaleriaJson();
            break;
        case 'deleteFoto':
            $coche->deleteFoto();
            break;
        case 'logout':
            $auth->logout();
            break;
        default:
            $coche->index();
            break;
    }
}