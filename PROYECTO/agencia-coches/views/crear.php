<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Coche - Agencia S.L.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="views/src/css/style.css">
</head>
<body class="bg-light">

    <?php include 'views/template/navbar.php'; ?>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0"><i class="bi bi-car-front me-2"></i>Registrar Nuevo Vehículo</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="index.php?action=create" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Marca</label>
                                    <input type="text" name="marca" class="form-control" placeholder="Ej: Audi" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Modelo</label>
                                    <input type="text" name="modelo" class="form-control" placeholder="Ej: A4" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Fecha de Fabricación</label>
                                    <input type="date" name="fechaFabricacion" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Kilómetros</label>
                                    <input type="number" name="kilometros" class="form-control" placeholder="0" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Combustible</label>
                                    <input type="text" name="combustible" class="form-control" placeholder="Gasolina/Diesel" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Color</label>
                                    <input type="text" name="color" class="form-control" placeholder="Ej: Blanco" required>
                                </div>
                                
                                <div class="col-12 mt-4">
                                    <label class="form-label fw-bold">Seleccionar Imágenes (La primera será la portada)</label>
                                    <input type="file" name="imagenes[]" id="input-galeria" class="form-control" accept="image/*" multiple required>
                                    <div id="preview-galeria" class="preview-container mt-3 d-flex flex-wrap"></div>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-5">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="bi bi-save me-1"></i> Crear Coche
                                </button>
                                <a href="index.php?action=index" class="btn btn-outline-danger px-4 py-2">
                                    <i class="bi bi-arrow-left me-1"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="./views/src/js/crear-preview.js"></script>
</body>
</html>