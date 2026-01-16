<?php require_once __DIR__ . '/../config/seguridad.php'; ?>

<!-- views/crear.php -->
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
                            <!-- Recordar de donde viene, si de cards o de table -->
                            <input type="hidden" name="view" value="<?php echo isset($_GET['view']) ? $_GET['view'] : 'cards'; ?>">

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
                                    <hr>
                                    <label class="form-label fw-bold d-block"><i class="bi bi-image me-2"></i>Imagen de Portada Principal</label>
                                    <div class="d-flex align-items-center gap-4 bg-light p-3 rounded border">
                                        <div class="text-center">
                                            <p class="small text-muted mb-1">Vista previa</p>
                                            <img id="preview-img" src="https://via.placeholder.com/120x80?text=Portada" 
                                                class="rounded shadow-sm border" width="120" height="80" style="object-fit: cover;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="small text-muted mb-1">Esta foto aparecerá en el listado principal</label>
                                            <input type="file" name="imagen_portada" id="input-foto" class="form-control" accept="image/*" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="form-label fw-bold"><i class="bi bi-images me-2"></i>Galería de Imágenes Adicionales</label>
                                    <div class="bg-white p-3 rounded border border-dashed">
                                        <label class="small text-muted mb-2">Puedes seleccionar varias fotos para los detalles:</label>
                                        <input type="file" name="imagenes_galeria[]" id="input-galeria-edit" class="form-control" accept="image/*" multiple>
                                        <div id="preview-galeria-edit" class="d-flex flex-wrap gap-2 mt-3"></div>
                                    </div>
                                </div>


                            </div>

                            <div class="d-flex gap-2 mt-5">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="bi bi-save me-1"></i> Crear Coche
                                </button>

                                <?php $vista_origen = isset($_GET['view']) ? $_GET['view'] : 'cards'; ?>
                                <a href="index.php?action=index&view=<?php echo $vista_origen; ?>" class="btn btn-outline-danger px-4 py-2">
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
    <script src="./views/src/js/nav-scroll.js"></script>
    
</body>
</html>