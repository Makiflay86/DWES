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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="views/src/css/style.css">
    
</head>

<body>

    <?php include 'views/template/navbar.php'; ?>

     <?php 
        // Detectamos la vista actual (por defecto cards)
        $vista = isset($_GET['view']) ? $_GET['view'] : 'cards'; 
    ?>

    <div class="container-fluid w-75">

        <!-- Encabezado -->
        <div class="row text-center py-5">
            <!-- Título -->
            <div class="col-lg-6 col-sm-12">
                <h2>Agencia de coches S.L.</h2>
            </div>

            <!-- Icon añadir coche -->
            <div class="col-lg-6 col-sm-12">
                <a href="index.php?action=create&view=<?php echo $vista; ?>" class="btn btn-primary">
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
    

        <?php if ($vista === 'table'): ?>
            <table class="table table-bordered table-striped text-center align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
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
                    <?php foreach ($coches as $coche): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($coche['marca']); ?></td>
                            <td><?php echo htmlspecialchars($coche['modelo']); ?></td>
                            <td><?php echo htmlspecialchars($coche['fechaFabricacion']); ?></td>
                            <td><?php echo number_format($coche['kilometros'], 0, ',', '.'); ?> km</td>
                            <td><?php echo htmlspecialchars($coche['combustible']); ?></td>
                            <td><?php echo htmlspecialchars($coche['color']); ?></td>
                            <td>
                                <?php if (!empty($coche['imagen'])): ?>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($coche['imagen']); ?>" 
                                        alt="Ver galeria" width="100" height="60" style="object-fit: cover; cursor: pointer;"
                                        onclick="abrirGaleria(<?php echo $coche['idCoche']; ?>, this.src)">
                                <?php else: ?>
                                    <span class="text-muted small">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="index.php?action=edit&id=<?php echo $coche['idCoche']; ?>&view=<?php echo $vista; ?>" 
                                    class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="index.php?action=delete&id=<?php echo $coche['idCoche']; ?>&view=<?php echo $vista; ?>" 
                                    class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($coches as $coche): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 card-hover">
                            <?php if (!empty($coche['imagen'])): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($coche['imagen']); ?>" 
                                    class="card-img-top" style="height: 200px; object-fit: cover; cursor: pointer;"
                                    onclick="abrirGaleria(<?php echo $coche['idCoche']; ?>, this.src)">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x250?text=Sin+Imagen" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <?php endif; ?>
                            
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($coche['marca'] . ' ' . $coche['modelo']); ?></h5>
                                <p class="card-text text-muted small">
                                    <span class="badge bg-light text-dark border"><?php echo htmlspecialchars($coche['combustible']); ?></span>
                                    <span class="ms-2"><?php echo number_format($coche['kilometros'], 0, ',', '.'); ?> km</span>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between pb-3">
                                <a href="index.php?action=edit&id=<?php echo $coche['idCoche']; ?>&view=<?php echo $vista; ?>"
                                class="btn btn-sm btn-primary px-3">Editar</a>
                                <a href="index.php?action=delete&id=<?php echo $coche['idCoche']; ?>&view=<?php echo $vista; ?>"
                                class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar?');">Eliminar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        


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