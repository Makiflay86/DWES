<!-- views/editar.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Coche</title>
</head>

<body>
    <h2>Editar Coche</h2>
    <!-- Usamos $coche_data que viene del controlador -->
    <form method="POST" action="index.php?action=edit&id=<?php echo $coche_data->idCoche; ?>">
        <input type="hidden" name="idCoche" value="<?php echo $coche_data->idCoche; ?>">
        <label>Marca: <input type="text" name="marca" value="<?php echo htmlspecialchars($coche_data->marca); ?>" required></label><br>
        <label>Modelo: <input type="text" name="modelo" value="<?php echo htmlspecialchars($coche_data->modelo); ?>" required></label><br>
        <label>Fecha de Fabricación: <input type="date" name="fechaFabricacion" value="<?php echo htmlspecialchars($coche_data->fechaFabricacion); ?>" required></label><br>
        <label>Kilometros: <input type="text" name="kilometros" value="<?php echo $coche_data->kilometros; ?>"></label><br>
        <label>Combustible: <input type="text" name="combustible" value="<?php echo $coche_data->combustible; ?>""></label><br>
        <label>Color: <input type="text" name="color" value="<?php echo $coche_data->color; ?>"></label><br>
        
        <!-- Mostrar imagen actual --> 
        <label>Imagen actual:</label><br> 
        <?php if (!empty($coche_data->imagen)): ?> 
        <img src="data:image/jpeg;base64,<?php echo base64_encode($coche_data->imagen); ?>" 
        alt="Imagen del coche" width="150"><br> 
        <?php else: ?> <span>Sin imagen</span><br> 
            <?php endif; ?> 
            
        <!-- Campo para subir nueva imagen --> 
        <label>Nueva imagen (opcional):</label> 
        <input type="file" name="imagen" accept="image/*"><br>

        <button type="submit" name="update">Actualizar Coche</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>