<?php
require_once 'config/Database.php';                      // incluimos el código de conexión a la BD

class Usuario
{
    private $PDO;
    private $tabla_nombre = "usuarios";                 // Tu tabla de usuarios

    public function __construct()
    {
        $database = new Database();                    // aquí se invoca al constructor Database, que crea la conexión
        $this->PDO = $database->getConnection();       // y se almacena en el objeto usuario, cuando se invoca su constructor
    }

    // Método para verificar usuario y contraseña
    public function login($idusuario, $password)      // para un objeto usuario, se puede invocar el método login()
    {                                                 // si tuviéramos registro, también se declararía un método para ello...
        /* Comprobamos que el idusuario exista */
        $query = "SELECT * FROM " . $this->tabla_nombre . " WHERE idusuario = ? LIMIT 1";
        $stmt = $this->PDO->prepare($query);
        $stmt->execute([$idusuario]);

        /* Buscar la contraseña que me ha pasado con la hash que esta en la bd */
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password']))
        {
            return $user;
        }


        return false; // Usuario no encontrado
    }

    public function insertar($email, $passwordHash, $nombre, $apellidos) {
        try {
            // Dejamos que coduser se autoincremente solo
            $sql = "INSERT INTO usuarios (idusuario, password, nombre, apellidos) VALUES (?, ?, ?, ?)";
            $stmt = $this->PDO->prepare($sql);
            
            return $stmt->execute([$email, $passwordHash, $nombre, $apellidos]);
        } catch (PDOException $e) {
            // Si el email ya existe y es UNIQUE en la DB, saltará aquí
            return false;
        }
    }
}