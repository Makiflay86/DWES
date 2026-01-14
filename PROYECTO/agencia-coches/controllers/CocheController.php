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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 1. Asignar datos básicos
            $this->coche->marca = $_POST['marca'];
            $this->coche->modelo = $_POST['modelo'];
            $this->coche->fechaFabricacion = $_POST['fechaFabricacion'];
            $this->coche->kilometros = $_POST['kilometros'];
            $this->coche->combustible = $_POST['combustible'];
            $this->coche->color = $_POST['color'];

            // 2. Preparar imagen principal (opcional)
            $this->coche->imagen = null; 
            if (!empty($_FILES['imagenes']['tmp_name'][0]) && $_FILES['imagenes']['error'][0] == 0) {
                $this->coche->imagen = file_get_contents($_FILES['imagenes']['tmp_name'][0]);
            }

            // 3. Crear el coche y obtener el ID
            $idNuevoCoche = $this->coche->create();

            if ($idNuevoCoche) {
                // 4. Procesar la galería
                if (!empty($_FILES['imagenes']['tmp_name'][0])) {
                    foreach ($_FILES['imagenes']['tmp_name'] as $index => $tmp_name) {
                        // VALIDACIÓN DE TAMAÑO ANTES QUE NADA
                        if ($_FILES['imagenes']['size'][$index] > 5000000) {
                            // Nota: El coche ya se creó, podrías redirigir con un aviso de "Coche creado pero algunas fotos fallaron"
                            continue; // Saltamos esta foto por ser muy pesada
                        }

                        if ($_FILES['imagenes']['error'][$index] == 0) {
                            $contenido = file_get_contents($tmp_name);
                            $this->coche->guardarImagenGaleria($idNuevoCoche, $contenido);
                        }
                    }
                }
                header("Location: index.php?action=index&message=created");
                exit();
            } else {
                $error = "Error al crear el coche en la base de datos.";
                include 'views/crear.php';
            }
        } else {
            include 'views/crear.php';
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            // Lógica de actualización (UPDATE)
            $this->coche->idCoche = $_POST['idCoche'];
            $this->coche->marca = $_POST['marca'];
            $this->coche->modelo = $_POST['modelo'];
            $this->coche->fechaFabricacion = $_POST['fechaFabricacion'];
            $this->coche->kilometros = $_POST['kilometros'];
            $this->coche->combustible = $_POST['combustible'];
            $this->coche->color = $_POST['color'];

            if (!empty($_FILES['imagen']['tmp_name'])) 
            {
                $imagen = file_get_contents($_FILES['imagen']['tmp_name']);

            } else 
            {
                $imagen = base64_decode($_POST['imagen_actual']);
            }
            $this->coche->imagen = $imagen;


            if ($this->coche->update()) 
            {
                header("Location: index.php?action=index&message=updated");
                exit();

            } else 
            {
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