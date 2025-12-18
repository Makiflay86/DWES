<!-- views/crear.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Coche</title>
</head>

<body>
    <h2>Crear Nuevo Coche</h2>
    <form method="POST" action="index.php?action=create">
        <label>Marca: <input type="text" name="nombre" required></label><br>
        <label>Modelo: <input type="text" name="apellidos" required></label><br>
        <label>Fecha de Fabricación: <input type="date" name="fechaFabricacion" required></label><br>
        <label>Kilometros: <input type="number" name="kilometros" required></label><br>
        <label>Combustible: <input type="text" name="combustible" required></label><br>
        <label>Color: <input type="text" name="color" required></label><br>
        <label>Imágen: <input type="file" name="imagen" accept="image/*" required></label><br>
        <button type="submit">Crear Coche</button>
    </form>
    <p><a href="index.php?action=index">Volver al listado</a></p>
</body>

</html>