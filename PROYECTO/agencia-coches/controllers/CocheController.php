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
            // 1. Asignar datos básicos
            $this->coche->marca = $_POST['marca'];
            $this->coche->modelo = $_POST['modelo'];
            $this->coche->fechaFabricacion = $_POST['fechaFabricacion'];
            $this->coche->kilometros = $_POST['kilometros'];
            $this->coche->combustible = $_POST['combustible'];
            $this->coche->color = $_POST['color'];

            /* Imagen de Portada */
            if (!empty($_FILES['imagen_portada']['tmp_name'])) 
            {
                $this->coche->imagen = file_get_contents($_FILES['imagen_portada']['tmp_name']);
            }

            /* Crear el coche y obtener el ID */
            $idNuevoCoche = $this->coche->create();

            if ($idNuevoCoche) 
            {
                /* Procesar Galería Extra */
                if (!empty($_FILES['imagenes_galeria']['tmp_name'][0])) 
                {
                    foreach ($_FILES['imagenes_galeria']['tmp_name'] as $index => $tmp_name) 
                    {
                        if ($_FILES['imagenes_galeria']['error'][$index] == 0) 
                        {
                            $contenido = file_get_contents($tmp_name);
                            $this->coche->guardarImagenGaleria($idNuevoCoche, $contenido);
                        }
                    }
                }

                $vista = $_POST['view'] ?? 'cards'; // Captura la vista del formulario
                header("Location: index.php?action=index&view=$vista&message=created");
                exit();

            } else 
            {
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
                if (!empty($_FILES['imagenes_galeria']['tmp_name'][0])) 
                {
                    foreach ($_FILES['imagenes_galeria']['tmp_name'] as $index => $tmp_name) 
                    {
                        // Validar que no haya errores en la subida y que el archivo exista
                        if ($_FILES['imagenes_galeria']['error'][$index] == 0) 
                        {
                            $contenido = file_get_contents($tmp_name);
                            // Usamos el método de tu modelo Coches.php
                            $this->coche->guardarImagenGaleria($this->coche->idCoche, $contenido);
                        }
                    }
                }

                $vista = $_POST['view'] ?? 'cards'; // Captura la vista del formulario
                header("Location: index.php?action=index&view=$vista&message=updated");
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

                /* Método para obtener las fotos extras */
                $galeria_data = $this->coche->getGaleria($_GET['id']);

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
                $vista = $_POST['view'] ?? 'cards'; // Captura la vista del formulario
                header("Location: index.php?action=index&view=$vista&message=error_delete");
                exit();
            }
        }
    }

    public function getGaleriaJson() 
    {
        $id = $_GET['id'] ?? null;
        $imagenes = [];
        if ($id) 
        {
            $res = $this->coche->getGaleria($id);
            foreach ($res as $row) 
            {
                $imagenes[] = ['imagen' => base64_encode($row['imagen'])];
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode($imagenes);
        exit(); // Importante para que no cargue el resto de la página
    }

    public function deleteFoto() 
    {
        $idFoto = $_GET['idFoto'] ?? null;
        $idCoche = $_GET['idCoche'] ?? null;

        if ($idFoto && $idCoche) 
        {
            // Llamamos al modelo para borrar
            if ($this->coche->eliminarFotoGaleria($idFoto)) 
            {
                // Volvemos a la edición del coche donde estábamos
                header("Location: index.php?action=edit&id=$idCoche&message=photo_deleted");
                exit();
            }
        }
    }
}