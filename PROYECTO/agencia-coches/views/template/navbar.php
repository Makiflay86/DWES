<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
    <div class="container-fluid px-5">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-car-front-fill me-2" viewBox="0 0 16 16">
                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
            </svg>
            <span class="fw-bold">Agencia de Coches S.L.</span>
        </a>

        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="d-flex gap-2 ms-auto text-white">
            <a href="index.php?action=index&view=cards" class="btn btn-outline-light btn-sm">
                <i class="bi bi-grid-3x3-gap-fill"></i> Vista Tarjetas
            </a>
            <a href="index.php?action=index&view=table" class="btn btn-outline-light btn-sm">
                <i class="bi bi-table"></i> Vista Tabla
            </a>
        </div>


        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex align-items-center">
                <span class="navbar-text text-white me-3">
                    <i class="bi bi-person-circle me-1"></i> 
                    Hola, <strong>Admin</strong> <!-- Aquí el codigo php ( <?php echo $_SESSION['nombre_usuario']; ?> ) -->
                </span>
                <a href="index.php?action=logout" class="btn btn-danger btn-sm border-0">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
</nav>