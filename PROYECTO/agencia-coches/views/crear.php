<!-- views/crear.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Coche</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

    <link rel="stylesheet" href="./views/src/css/style.css">
</head>

<body>

    <div class="container-fluid w-50 mx-auto">


        <h2>Crear Nuevo Coche</h2>
        <form class="form" method="POST" action="index.php?action=create">
            <label>Marca: <input type="text" name="marca" required></label><br>
            <label>Modelo: <input type="text" name="modelo" required></label><br>
            <label>Fecha de Fabricación: <input type="date" name="fechaFabricacion" required></label><br>
            <label>Kilometros: <input type="number" name="kilometros" required></label><br>
            <label>Combustible: <input type="text" name="combustible" required></label><br>
            <label>Color: <input type="text" name="color" required></label><br>
            <label>Imágen: <input type="file" name="imagen" accept="image/*" required></label><br>
            <button type="submit">Crear Coche</button>
        </form>
        <p><a href="index.php?action=index">Volver al listado</a></p>


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