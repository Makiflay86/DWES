<?php
// config/seguridad.php

if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
}

// 1. COMPROBAR SESIÓN: ¿Está logueado?
if (!isset($_SESSION['usuario_logueado']) || $_SESSION['usuario_logueado'] !== true) {
    $_SESSION['error'] = "Debes hacer login para entrar.";
    header("Location: ../index.php?action=login"); 
    exit();
}

// 2. COMPROBAR TOKEN CSRF: ¿Es una sesión válida y segura?
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['error'] = "Sesión no válida o token expirado.";
    header("Location: ../index.php?action=login");
    exit(); 
}

// 3. COMPROBAR ORIGEN: ¿Viene a través del index.php?
// Nota: Solo activamos esto si definiste BASE_URL en tu config.php
if (!defined('BASE_URL')) {
    // Si entran directo al archivo .php en /views, BASE_URL no existirá
    $_SESSION['error'] = "Acceso directo no permitido.";
    header("Location: ../index.php?action=login");
    exit();
}