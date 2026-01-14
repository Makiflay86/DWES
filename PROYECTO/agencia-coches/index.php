<?php
// index.php (controlador de rutas)

require_once 'controllers/CocheController.php'; // incluimos la declaración de la Clase CocheController

$controller = new CocheController();            // creamos una instancia del controlador de coche

// Determina qué acción se solicita, si no hubiera ninguna, por defecto adoptamos index
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Llama al método correspondiente del controlador
switch ($action) 
{
    case 'index':
        $controller->index();          // se invoca al método index() de CocheController
        break;
    case 'create':
        $controller->create();         // se invoca al método create() de CocheController
        break;
    case 'edit':
        $controller->edit();           // se invoca al método edit() de CocheController
        break;
    case 'delete':
        $controller->delete();         // se invoca al método delete() de CocheController
        break;
    case 'getGaleriaJson':
        $controller->getGaleriaJson(); // se invoca al método getGaleriaJson() de CocheController
        break;
    default:
        $controller->index();          // por defecto, se invoca a index()
        break;
}