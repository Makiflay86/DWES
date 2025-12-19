# Sistema de Login MVC

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?logo=bootstrap&logoColor=white)

Este proyecto es una implementación de un sistema de autenticación de usuarios utilizando el patrón de diseño **Modelo-Vista-Controlador (MVC)** en PHP. El objetivo es separar la lógica de negocio de la interfaz de usuario para crear un código más limpio y mantenible.





## Requisitos e Instalación

Para ejecutar este proyecto en tu máquina local, sigue estos pasos:

1.  **Entorno de Servidor:** Debes tener instalado **XAMPP**, Laragon o cualquier servidor que soporte PHP y MySQL.



2.  **Clonar el Repositorio:**
    ```bash
    git clone https://github.com/Makiflay86/DWES.git
    ```



3. **Ubicación del Proyecto:**
    Este proyecto no se encuentra en la raíz del repositorio. Si has clonado el repositorio completo, lo encontrarás en:
    `DWES/PROYECTO/login-mvc`



4.  **Base de Datos:**
    * Abre **phpMyAdmin**.
    * Crea una nueva base de datos con el nombre `login-php`.
    * Importa el archivo `login-php.sql` que se encuentra en la raíz del proyecto para crear las tablas necesarias.



5.  **Configuración:**
    * Dirígete a `config/Database.php` y asegúrate de que los parámetros de conexión (host, dbname, usuario y contraseña) coincidan con tu configuración local.





## Estructura del Proyecto

La organización de los archivos sigue la arquitectura MVC y separa claramente los recursos estáticos de la lógica del servidor:

```text
login-mvc/
├── index.php                      # Front Controller / Router
│
├── config/                        # Configuración
│   ├── Database.php               # Conexión a la base de datos (PDO)
│   ├── config.php                 # La ruta raíz para los estilos y redirecciones
│   └── establecer-sesion.php      # Funciones de seguridad
│
├── controllers/                   # Controladores
│   └── AuthController.php         # Controlador de autenticación
│
├── models/                        # Modelos
│   └── Usuario.php                # Modelo de usuarios
│
├── views/                         # Vistas
│   ├── login.php                  # Formulario de login y sign-up
│   ├── dashboard.php              # Página de bienvenida
│   ├── css/
│   │   └── style.css              # Estilos personalizados
│   ├── js/
│   │   ├── dark-mode.js           # Modo oscuro
│   │   ├── show-section.js        # Alternar entre login y sign-up
│   │   ├── toggle-password.js     # Alternar en ver o no ver la password
│   │   └── validaciones.js        # Validar el formulario
│   └── img/                       
│       ├── favicon.ico            # Imagenes decorativas
│       └── favicon2.ico             
│
├── login-php.sql                  # Script SQL para crear la BD
│
├── img-readme/                    # Capturas para README
│   ├── 
│   ├── 
│   ├── 
│   └── 
│
└── README.md                      # Este archivo
```





## Explicación del Código

### Lógica del Controlador

El `AuthController.php` centraliza toda la inteligencia del sistema. A continuación, se detallan sus componentes de seguridad y control:

#### 1. Control de Intentos y Bloqueo (Anti-Fuerza Bruta)
El sistema monitoriza los fallos de inicio de sesión. Si un usuario falla más de 5 veces, se activa un "cooldown" de 5 minutos. El controlador calcula el tiempo restante y bloquea el acceso hasta que el tiempo expire, protegiendo el sistema de ataques automatizados.

![Captura: Control de Intentos](img-readme/control-intentos.png)

#### 2. Validación de Seguridad CSRF
Para cada petición de autenticación, el controlador compara el `csrf_token` enviado por el formulario con el almacenado en la sesión. Si no coinciden, la petición se aborta, evitando que atacantes externos realicen acciones en nombre del usuario.

![Captura: Validación CSRF](img-readme/validacion-csrf.png)

#### 3. Autenticación y Sanitización
Antes de consultar la base de datos, los datos recibidos mediante `POST` se limpian con `htmlspecialchars`. Una vez validados, se invoca al modelo para verificar las credenciales y, en caso de éxito, se inicializan las variables de sesión del usuario.

![Captura: Proceso de Autenticación](img-readme/autenticacion-logic.png)

#### 4. Protección de Rutas (Middleware de Sesión)
Al invocar la función `dashboard()`, el controlador realiza una comprobación de seguridad inmediata: verifica si existe la variable de sesión `idusuario`. Si el usuario no está autenticado (la sesión no existe), el sistema bloquea el acceso y lo redirige automáticamente al formulario de login; en caso contrario, permite la carga de la vista privada. Esta lógica impide que cualquier persona acceda al panel de control simplemente escribiendo la URL en el navegador.

![Captura: Protección de Rutas](img-readme/proteccion-rutas.png)

#### 5. Cierre de Sesión Seguro (Logout)
No solo destruye la sesión con `session_destroy()`. El código limpia las variables de sesión (`session_unset`) y elimina físicamente la cookie de sesión del navegador del usuario, garantizando que nadie pueda reutilizar la sesión anterior.

![Captura: Cierre de Sesión](img-readme/logout-logic.png)



### Modelo de Datos (`Usuario.php`)

El modelo es el componente encargado de interactuar con la base de datos, abstrayendo la lógica de persistencia del resto de la aplicación.

#### 1. Conexión Mediante Inyección de Dependencias
Al instanciar la clase `Usuario`, su constructor invoca automáticamente a la clase `Database` para establecer una conexión segura a través de **PDO**. Esto garantiza que cada objeto de usuario tenga acceso a las herramientas necesarias para realizar consultas.

![Captura: Constructor y Conexión](img-readme/modelo-conexion.png)

#### 2. Consultas Preparadas (Protección SQL Injection)
Para verificar las credenciales, el modelo utiliza **sentencias preparadas** (`prepare` y `execute`). Esta técnica es vital para la seguridad, ya que evita ataques de **Inyección SQL** al separar la estructura de la consulta de los datos proporcionados por el usuario.

![Captura: Consultas Preparadas](img-readme/consultas-preparadas.png)

#### 3. Verificación Segura de Contraseñas (`password_verify`)
El sistema no almacena ni compara contraseñas en texto plano. En su lugar, recupera el hash almacenado en la base de datos y utiliza la función nativa `password_verify()` para comprobar si la contraseña introducida coincide con el hash, cumpliendo con los estándares modernos de seguridad.

![Captura: Verificación de Hash](img-readme/password-verify.png)





### Interfaz de Usuario (`views/login.php`)

La vista de acceso ha sido diseñada con **Bootstrap 5**, priorizando la usabilidad y ofreciendo una experiencia moderna e interactiva.

#### 1. Sistema de Alertas Dinámicas
La vista utiliza sesiones de PHP para mostrar mensajes de error en tiempo real (como fallos de autenticación o bloqueos). Estas alertas se renderizan automáticamente y se eliminan de la sesión tras mostrarse para evitar repeticiones innecesarias.

![Captura: Mensajes de Error](img-readme/vista-alertas.png)

#### 2. Formulario Dual (Login/Registro)
Mediante manipulación del DOM con JavaScript, la vista permite alternar entre el formulario de inicio de sesión y el de registro sin recargar la página, mejorando la fluidez de la aplicación.

![Captura: Cambio entre Login y Registro](img-readme/interfaz-dual.png)

#### 3. Seguridad Visual: Ver Contraseña
Se ha implementado una funcionalidad que permite al usuario alternar la visibilidad de su contraseña mediante un icono de ojo. Esto reduce errores de escritura y mejora la accesibilidad del formulario.

![Captura: Toggle Password](img-readme/ver-password.png)

#### 4. Modo Oscuro (Dark Mode)
El sistema incluye un botón flotante para alternar entre temas claro y oscuro. Esta preferencia se gestiona mediante JavaScript, adaptando los colores de la tarjeta y el fondo para mayor comodidad visual.

![Captura: Modo Oscuro](img-readme/modo-oscuro.png)

#### 5. Meta-Etiquetas y SEO
El archivo incluye una configuración exhaustiva de etiquetas `<meta>` para **Open Graph** y **Twitter Cards**, lo que permite que el enlace del proyecto se visualice con una tarjeta rica en información y favicon personalizado al ser compartido en redes sociales.

![Captura: Vista de Favicon y Metas](img-readme/meta-tags.png)

#### 6. Control de Acceso Preventivo (Redirección Automática)
Al inicio del archivo `login.php`, el código verifica inmediatamente si ya existe una sesión activa (`usuario_logueado`). Si es así, redirige al usuario al dashboard de forma automática, evitando que un usuario ya autenticado vuelva a ver el formulario de acceso innecesariamente.

![Captura: Redirección Preventiva](img-readme/check-sesion.png)

#### 7. Implementación de Token CSRF (Hidden Input)
Dentro de cada formulario (`form1` y `form2`), se incluye un campo de tipo `hidden` que inyecta el `csrf_token` generado en el servidor. Este token es invisible para el usuario pero fundamental para que el controlador valide que la petición es legítima y proviene de nuestro propio sitio, bloqueando cualquier intento de falsificación externa.

![Captura: Input Hidden CSRF](img-readme/hidden-csrf.png)





## Base de Datos y Persistencia (phpMyAdmin)

El proyecto utiliza **MariaDB** para la gestión de usuarios. A continuación se detalla la estructura lógica exacta de la tabla y los pasos para su despliegue.

### 1. Esquema de la Tabla `usuarios`
La tabla cuenta con una clave primaria autoincremental y campos optimizados para el almacenamiento de credenciales seguras.

| # | Nombre | Tipo | Atributos / Extra | Descripción |
| :--- | :--- | :--- | :--- | :--- |
| 1 | **id** | `int(11)` | PRIMARY KEY, AUTO_INCREMENT | Identificador numérico único. |
| 2 | **idusuario** | `varchar(60)` | INDEX | Nombre de usuario o correo de acceso. |
| 3 | **password** | `varchar(255)` | NOT NULL | Hash de la contraseña (longitud para BCRYPT). |
| 4 | **nombre** | `varchar(30)` | NOT NULL | Nombre de pila del usuario. |
| 5 | **apellidos** | `varchar(60)` | NOT NULL | Apellidos del usuario. |

![Captura: Estructura real en phpMyAdmin](img-readme/estructura-db.png)

### 2. Proceso de Importación
Para configurar el entorno de datos correctamente en **XAMPP**:

1. **Crear DB:** Crea una base de datos llamada `login-php` con cotejamiento `utf8mb4_spanish_ci`.
2. **Importar:** Selecciona el archivo `login-php.sql` desde la pestaña **Importar**.
3. **Verificar:** Una vez finalizado, la tabla `usuarios` aparecerá con la estructura mostrada arriba.

![Captura: Importación del script SQL](img-readme/importacion-sql.png)





## Tecnologías y Referencias

Para garantizar la seguridad y eficiencia de este sistema, se han integrado las siguientes herramientas y estándares:

* **Lenguaje y Persistencia:** PHP 8.x utilizando la interfaz **PDO** (PHP Data Objects) para una comunicación segura con la base de datos.
* **Seguridad de Acceso:** Implementación de **BCRYPT** para el hash de contraseñas y validación de **CSRF Tokens** para prevenir ataques de falsificación.
* **Diseño y UI:** Interfaz construida con **Bootstrap 5.3** y **Bootstrap Icons** para asegurar un entorno responsivo y moderno.
* **Gestión de Sesiones:** Configuración de cookies seguras (`httponly` y `Samesite`) y regeneración de ID para mitigar el secuestro de sesiones.





## Uso
1. Inicia los servicios de Apache y MySQL en XAMPP.
2. Coloca la carpeta del proyecto en `htdocs`.
3. Abre tu navegador y navega a `http://localhost/DWES/PROYECTO/login-mvc/`.

---
Desarrollado por [Francisco Aybar Romero](https://github.com/Makiflay86)