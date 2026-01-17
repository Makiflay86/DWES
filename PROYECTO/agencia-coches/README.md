# 🚀 Sistema de Gestión de Autenticación - Agencia S.L.

Este proyecto es una plataforma robusta de **Inicio de Sesión y Registro** desarrollada en **PHP Nativo**. Implementa una arquitectura de controlador centralizado y se enfoca en la seguridad del lado del servidor y una interfaz de usuario dinámica.

---

## 📝 Descripción del Proyecto
La aplicación gestiona el acceso de usuarios mediante un sistema de sesiones seguras. Utiliza **Bootstrap 5** para el diseño visual y **JavaScript nativo** para manejar la interactividad (cambio de secciones, validaciones y modo oscuro) sin necesidad de recargar la página constantemente.



---

## 🛠️ Tecnologías Utilizadas
* **Backend:** PHP 8.x (Lógica de sesiones, seguridad CSRF y control de acceso).
* **Frontend:** HTML5, CSS3, JavaScript (ES6+).
* **Framework CSS:** Bootstrap 5.3.2 & Bootstrap Icons.
* **Seguridad:** OpenSSL para generación de tokens.

---

## 📂 Estructura y Función de los Archivos

### 🔑 Core / Controlador
* **`index.php`**: Es el **Front Controller**. Centraliza todas las peticiones mediante el parámetro `action`. Decide si el usuario debe ser autenticado, registrado o redirigido a la zona interna.

### 🖼️ Vistas (`/views`)
* **`login.php`**: La interfaz principal. Contiene tanto el formulario de entrada como el de registro.
    * **Lógica de Bloqueo:** Impide el acceso si no se pasa por el controlador.
    * **SEO & Metadatos:** Configuración completa para buscadores y redes sociales (Open Graph).

### ⚡ Scripts y Estilos (`/views/src`)
* **`js/validaciones.js`**: Validación en tiempo real de correos y contraseñas.
* **`js/show-section.js`**: Alterna la visibilidad entre el Login y el Registro mediante manipulación del DOM.
* **`js/dark-mode.js`**: Gestiona el cambio de tema visual y la persistencia.
* **`css/style-login.css`**: Estilos específicos para la tarjeta de acceso y animaciones.

---

## 🔒 Inserciones de Código Importantes

### 1. Protección contra Acceso Directo
Este fragmento asegura que nadie pueda saltarse el controlador principal:
```php
if (!defined('BASE_URL')) {
    $_SESSION['error'] = "Acceso directo no permitido.";
    header("Location: ../index.php?action=login");
    exit();
}
```

### 2. Protección contra Acceso Directo
Para evitar ataques de falsificación de peticiones, generamos un token único por sesión:
```php
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(64));
}
```

### 3. Cambio Dinámico de Secciones (JS)
El sistema permite cambiar entre formularios sin refrescar el navegador:
```php
function showSection(sectionId) {
    document.getElementById('login-section').style.display = 'none';
    document.getElementById('register-section').style.display = 'none';
    document.getElementById(sectionId).style.display = 'block';
}
```

## Instalación y Configuración
* Servidor Local: Coloca el proyecto en tu carpeta de servidor (ej: htdocs o www).

* Base de Datos: Crea una base de datos e importa la tabla de usuarios (se requiere un campo email y password con hash).

* Configuración: Define la constante BASE_URL en tu archivo de inicio para que las rutas coincidan con tu entorno local.

* Acceso: Navega a http://localhost/tu-proyecto/index.php.

---

Autor: Francisco Aybar Romero