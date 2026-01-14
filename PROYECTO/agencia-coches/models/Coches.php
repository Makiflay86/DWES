<?php
// models/Coches.php
class Coches
{
    private $conn;
    private $table_name = "coches";

    public $idCoche;
    public $marca;
    public $modelo;
    public $fechaFabricacion;
    public $kilometros;
    public $combustible;
    public $color;
    public $imagen;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Método para leer todos los coches
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY idCoche ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para crear un coches
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET marca=:marca, modelo=:modelo, fechaFabricacion=:fechaFabricacion, kilometros=:kilometros, combustible=:combustible, color=:color, imagen=:imagen";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":fechaFabricacion", $this->fechaFabricacion);
        $stmt->bindParam(":kilometros", $this->kilometros, PDO::PARAM_INT);
        $stmt->bindParam(":combustible", $this->combustible);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":imagen", $this->imagen, PDO::PARAM_LOB);

        if ($stmt->execute()) 
        {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    // Método para leer un solo coche (para editar)
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idCoche = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idCoche);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) 
        {
            $this->marca = $row['marca'];
            $this->modelo = $row['modelo'];
            $this->fechaFabricacion = $row['fechaFabricacion'];
            $this->kilometros = $row['kilometros'];
            $this->combustible = $row['combustible'];
            $this->color = $row['color'];
            $this->imagen = $row['imagen'];
        }
    }

    // Método para actualizar un coche
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET marca=:marca, modelo=:modelo, fechaFabricacion=:fechaFabricacion, kilometros=:kilometros, combustible=:combustible, color=:color, imagen=:imagen WHERE idCoche=:idCoche";
        $stmt = $this->conn->prepare($query);

        // Limpiar y enlazar parámetros
        $this->marca = $this->marca;
        $this->modelo = $this->modelo;
        // ... validaciones si fueran necesarias

        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":fechaFabricacion", $this->fechaFabricacion);
        $stmt->bindParam(":kilometros", $this->kilometros, PDO::PARAM_INT);
        $stmt->bindParam(":combustible", $this->combustible);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":imagen", $this->imagen);
        $stmt->bindParam(":idCoche", $this->idCoche, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar un coche
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE idCoche = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idCoche, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function guardarImagenGaleria($idCoche, $imagenContenido) 
    {
        $query = "INSERT INTO coche_imagenes (idCoche, imagen) VALUES (:idCoche, :imagen)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':idCoche', $idCoche);
        // Usamos PDO::PARAM_LOB para datos binarios grandes
        $stmt->bindParam(':imagen', $imagenContenido, PDO::PARAM_LOB);
        
        return $stmt->execute();
    }
}