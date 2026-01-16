<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
    <div class="container-fluid px-lg-5"> 
        
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <i class="bi bi-car-front-fill me-2" style="font-size: 1.5rem;"></i>
            <span class="fw-bold">Agencia de Coches S.L.</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto gap-2 py-2 py-lg-0">
                <a href="index.php?action=index&view=cards" class="btn btn-outline-light btn-sm text-start">
                    <i class="bi bi-grid-3x3-gap-fill"></i> Vista Tarjetas
                </a>
                <a href="index.php?action=index&view=table" class="btn btn-outline-light btn-sm text-start">
                    <i class="bi bi-table"></i> Vista Tabla
                </a>
            </div>

            <div class="d-flex align-items-center ms-lg-3 py-2 py-lg-0">
                <span class="navbar-text text-white me-3">
                    <i class="bi bi-person-circle me-1"></i> 
                    Hola, <strong><?php echo $_SESSION['nombre_usuario']; ?></strong>
                </span>
                <a href="index.php?action=logout" class="btn btn-danger btn-sm border-0">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>
        </div>

    </div>
</nav>