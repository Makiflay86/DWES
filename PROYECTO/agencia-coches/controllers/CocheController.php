<?php
// controllers/CocheController.php
include_once 'config/Database.php';
include_once 'models/Coches.php';

class CocheController
{
    private $db;
    private $coche;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->coche = new Coches($this->db);
    }

    public function index()
    {
        $stmt = $this->coche->read();
        $coches = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/listar.php';
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $this->coche->marca = $_POST['marca'];
            $this->coche->modelo = $_POST['modelo'];
            $this->coche->fechaFabricacion = $_POST['fechaFabricacion'];
            $this->coche->kilometros = $_POST['kilometros'];
            $this->coche->combustible = $_POST['combustible'];
            $this->coche->color = $_POST['color'];
            $this->coche->imagen = $_POST['imagen'];

            if ($this->coche->create()) 
            {
                header("Location: index.php?action=index&message=created");
                exit();

            } else 
            {
                $error = "Error al crear coche.";
                include 'views/crear.php'; // Recargar vista con error
            }
        } else {
            include 'views/crear.php';
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lógica de actualización (UPDATE)
            $this->coche->idCoche = $_POST['idCoche'];
            $this->coche->marca = $_POST['marca'];
            $this->coche->modelo = $_POST['modelo'];
            $this->coche->fechaFabricacion = $_POST['fechaFabricacion'];
            $this->coche->kilometros = $_POST['kilometros'];
            $this->coche->combustible = $_POST['combustible'];
            $this->coche->color = $_POST['color'];
            $this->coche->imagen = $_POST['imagen'];

            if ($this->coche->update()) {
                header("Location: index.php?action=index&message=updated");
                exit();
            } else {
                $error = "Error al actualizar.";
            }
        }

        // Lógica para mostrar el formulario de edición (READ ONE)
        if (isset($_GET['id'])) 
        {
            $this->coche->idCoche = $_GET['id'];
            $this->coche->readOne();
            if ($this->coche->marca) 
            {
                $coche_data = (object)['idCoche' => $this->coche->idCoche, 'marca' => $this->coche->marca, 'modelo' => $this->coche->modelo, 'fechaFabricacion' => $this->coche->fechaFabricacion, 'kilometros' => $this->coche->kilometros, 'combustible' => $this->coche->combustible, 'color' => $this->coche->color, 'imagen' => $this->coche->imagen];
                include 'views/editar.php';

            } else 
            {
                echo "Coche no encontrado.";
            }
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) 
        {
            $this->coche->idCoche = $_GET['id'];
            if ($this->coche->delete()) 
            {
                header("Location: index.php?action=index&message=deleted");
                exit();

            } else 
            {
                header("Location: index.php?action=index&message=error_delete");
                exit();
            }
        }
    }
}