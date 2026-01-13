<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <title>Listado de Coches (MVC)</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./src/css/style.css">
    
</head>

<body>
    <div class="container-fluid w-75">


        <h2>Listado de Coches</h2>
    
        <?php if (isset($_GET['message'])): ?>
            <div class="w-25 mx-auto">
                <?php
                // aquí se mostrarían los diferentes mensajes de confirmación tras la realización
                // de cualquiera de las 3 operaciones restantes: crear, modificar, eliminar
                // ya que volveremos a esta vista
                if ($_GET['message'] == 'created') echo '<div class="alert alert-success" role="alert">
                                                           Coche creado correctamente.
                                                         </div>';
                if ($_GET['message'] == 'updated') echo '<div class="alert alert-success" role="alert">
                                                            Coche actualizado correctamente.
                                                        </div>';
                if ($_GET['message'] == 'deleted') echo '<div class="alert alert-success" role="alert">
                                                            Coche eliminado correctamente.
                                                        </div>';
                ?>
            </div>
        <?php endif; ?>
    
        <div class="svg-add">
            <a href="index.php?action=create">
                <svg class="bi bi-plus-circle-fill" xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                </svg>
                add
            </a>
        </div>
    
        <table class="table">
            <thead>
                <tr>
                    <th>idCoche</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Fecha Fabricación</th>
                    <th>Kilometros</th>
                    <th>Combustible</th>
                    <th>Color</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coches as $coche): ?><!-- coche es una colección de filas de la tabla -->
                    <tr>
                        <td><?php echo $coche['idCoche']; ?></td>
                        <td><?php echo htmlspecialchars($coche['marca']); ?></td>
                        <td><?php echo htmlspecialchars($coche['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($coche['fechaFabricacion']); ?></td>
                        <td><?php echo htmlspecialchars($coche['kilometros']); ?></td>
                        <td><?php echo htmlspecialchars($coche['combustible']); ?></td>
                        <td><?php echo htmlspecialchars($coche['color']); ?></td>
                        <td>
                            <?php if (!empty($coche['imagen'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($coche['imagen']); ?>" 
                                    alt="Imagen del coche" width="100">
                            <?php else: ?>
                                Sin imagen
                            <?php endif; ?>
                        </td>
    
                        <td>
                            <!-- en la última celda incluimos los botones para ir a borrar o editar una fila -->
                            <a href="index.php?action=edit&id=<?php echo $coche['idCoche']; ?>">Editar</a> |
                            <a href="index.php?action=delete&id=<?php echo $coche['idCoche']; ?>" onclick="return confirm('¿Estás seguro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        
    </div>




    <!-- Bootstrap Scripts -->
     <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>

</body>

</html>