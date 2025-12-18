<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Coches (MVC)</title>
    <style>                            
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Listado de Coches</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="message">
            <?php
            // aquí se mostrarían los diferentes mensajes de confirmación tras la realización
            // de cualquiera de las 3 operaciones restantes: crear, modificar, eliminar
            // ya que volveremos a esta vista
            if ($_GET['message'] == 'created') echo 'Coche creado correctamente.';
            if ($_GET['message'] == 'updated') echo 'Coche actualizado correctamente.';
            if ($_GET['message'] == 'deleted') echo 'Coche eliminado correctamente.';
            ?>
        </div>
    <?php endif; ?>

    <p><a href="index.php?action=create">Añadir Nuevo Coche</a></p>

    <table>
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

</body>

</html>