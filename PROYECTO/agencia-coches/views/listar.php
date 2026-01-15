<!-- views/listar.php -->
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <title>Agencia S.L.</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

    <link rel="stylesheet" href="views/src/css/style.css">
    
</head>

<body>

    <?php include 'views/template/navbar.php'; ?>

    <div class="container-fluid w-75">

        <!-- Encabezado -->
        <div class="row text-center py-5">
            <!-- Título -->
            <div class="col-lg-6 col-sm-12">
                <h2>Agencia de coches S.L.</h2>
            </div>

            <!-- Icon añadir coche -->
            <div class="col-lg-6 col-sm-12">
                <a href="index.php?action=create" class="btn btn-primary">
                    <svg class="bi bi-plus-circle-fill" xmlns="http://www.w3.org/2000/svg" width="30" fill="white" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                    </svg>
                    <span class="ps-1 text-white">Añadir coche</span>
                </a>
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
                                    alt="Ver galeria del coche" width="128" height="auto"
                                    class="img-expandir" style="cursor: pointer;"
                                    onclick="abrirGaleria(<?php echo $coche['idCoche']; ?>, 'data:image/jpeg;base64,<?= base64_encode($coche['imagen']); ?>')">
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


        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0 text-center">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <img src="" id="mainGalleryImg" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-12">
                                <div id="thumbContainer" class="d-flex justify-content-center flex-wrap gap-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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

    <script src="./views/src/js/abrir-galeria.js"></script>

</body>

</html>