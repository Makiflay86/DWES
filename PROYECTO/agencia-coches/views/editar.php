<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Coche - Agencia S.L.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="bi bi-car-front-fill me-2"></i>Agencia de Coches</a>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Editar Información del Vehículo</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="index.php?action=edit&id=<?php echo $coche_data->idCoche; ?>" enctype="multipart/form-data">
                            <input type="hidden" name="idCoche" value="<?php echo $coche_data->idCoche; ?>">
                            <input type="hidden" name="imagen_actual" value="<?php echo base64_encode($coche_data->imagen); ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Marca</label>
                                    <input type="text" name="marca" class="form-control" value="<?php echo htmlspecialchars($coche_data->marca); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Modelo</label>
                                    <input type="text" name="modelo" class="form-control" value="<?php echo htmlspecialchars($coche_data->modelo); ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Fecha de Fabricación</label>
                                    <input type="date" name="fechaFabricacion" class="form-control" value="<?php echo htmlspecialchars($coche_data->fechaFabricacion); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Kilómetros</label>
                                    <div class="input-group">
                                        <input type="number" name="kilometros" class="form-control" value="<?php echo $coche_data->kilometros; ?>">
                                        <span class="input-group-text">km</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Combustible</label>
                                    <input type="text" name="combustible" class="form-control" value="<?php echo htmlspecialchars($coche_data->combustible); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Color</label>
                                    <input type="text" name="color" class="form-control" value="<?php echo htmlspecialchars($coche_data->color); ?>">
                                </div>

                                <div class="col-12 mt-4">
                                    <hr>
                                    <label class="form-label fw-bold d-block">Imagen del Vehículo</label>
                                    <div class="d-flex align-items-center gap-4 bg-light p-3 rounded">
                                        <div class="text-center">
                                            <p class="small text-muted mb-1">Vista previa</p>
                                            <?php if (!empty($coche_data->imagen)): ?> 
                                                <img id="preview-img" src="data:image/jpeg;base64,<?php echo base64_encode($coche_data->imagen); ?>" 
                                                    class="rounded shadow-sm border" width="120" height="80" style="object-fit: cover;">
                                            <?php else: ?> 
                                                <img id="preview-img" src="https://via.placeholder.com/120x80?text=Sin+Foto" 
                                                    class="rounded shadow-sm border" width="120" height="80" style="object-fit: cover;">
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="small text-muted mb-1">Subir nueva (reemplaza la actual)</label>
                                            <input type="file" name="imagen" id="input-foto" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-5">
                                <button type="submit" name="update" class="btn btn-success px-4 py-2">
                                    <i class="bi bi-check-circle me-1"></i> Guardar Cambios
                                </button>
                                <a href="index.php?action=index" class="btn btn-outline-secondary px-4 py-2">
                                    <i class="bi bi-arrow-left me-1"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>