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

    <link rel="stylesheet" href="./views/src/css/style.css">
    
</head>

<body>
    <div class="container-fluid w-75">

        <!-- nav -->
        <nav class="navbar fixed-top bg-body-tertiary px-5 py-2">
            <div class="container-fluid">
                <!-- icon -->
                <a class="navbar-brand" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                        <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                    </svg>
                </a>

                <!-- Barra de búsqueda -->
                <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn btn-outline-dark" type="submit">Buscar</button>
                </form>

                <!-- tu usuario y logout -->
                <div class="ms-auto">
                    <span class="navbar-text me-3">
                        Hola, <strong><!-- <?php echo $_SESSION['nombre_usuario']; ?> --></strong>
                    </span>
                    <a href="index.php?action=logout" class="btn btn-outline-danger btn-sm">Cerrar sesión</a>
                </div>
            </div>
        </nav>


        <!-- Espacio parar no tapar el contenido con el nav -->
        <div class="my-5"></div>



        <!-- Encabezado -->
        <div class="row text-center py-5">
            <!-- Título -->
            <div class="col-lg-6 col-sm-12">
                <h2>Listado de Coches</h2>
            </div>

            <!-- Icon añadir coche -->
            <div class="col-lg-6 col-sm-12">
                <button class="btn btn-primary">
                    <a href="index.php?action=create">
                        <svg class="bi bi-plus-circle-fill" xmlns="http://www.w3.org/2000/svg" width="30" fill="white" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                        </svg>
                        <span class="ps-1 text-black">Añadir coche</span>
                    </a>
                </button>
            </div>
        </div>
    
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
    

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <!-- <th scope="col">idCoche</th> -->
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
                        <!-- <td><?php echo $coche['idCoche']; ?></td> -->
                        <td><?php echo htmlspecialchars($coche['marca']); ?></td>
                        <td><?php echo htmlspecialchars($coche['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($coche['fechaFabricacion']); ?></td>
                        <td><?php echo htmlspecialchars($coche['kilometros']); ?></td>
                        <td><?php echo htmlspecialchars($coche['combustible']); ?></td>
                        <td><?php echo htmlspecialchars($coche['color']); ?></td>
                        <td>
                            <?php if (!empty($coche['imagen'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($coche['imagen']); ?>" 
                                    alt="Imagen del coche" width="128" height="auto">
                            <?php else: ?>
                                Sin imagen
                            <?php endif; ?>
                        </td>
    
                        <td>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <a href="index.php?action=edit&id=<?php echo $coche['idCoche']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="50" fill="rgb(214, 214, 41)" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </a>
                                </div>

                                <div class="col-lg-6 col-sm-12">
                                    <a href="index.php?action=delete&id=<?php echo $coche['idCoche']; ?>" onclick="return confirm('¿Estás seguro?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="60" fill="red" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        
    </div>


    <!-- Footer -->
    <footer class="mt-5">
        
    </footer>


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