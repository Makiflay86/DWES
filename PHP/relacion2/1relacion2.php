<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 1</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        
        <form class="w-50 m-auto p-3" action="" method="get">
            <h3>Calculadora básica con 2 números y un operador</h3>
            
            <div class="mb-3">
                <label class="form-label" for="numero1">Introduce número 1: </label>
                <input class="form-control" type="text" name="numero1" id="numero1">
            </div>    
            
            <div class="mb-3">
                <label class="form-label" for="operador">Elige operador: </label>
                <select class="form-select" name="operador" id="operador">
                    <option value="sumar">+</option>
                    <option value="resta">-</option>
                    <option value="producto">*</option>
                    <option value="division">/</option>
                    <option value="resto">%</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label class="form-label" for="numero2">Introduce número 2: </label>
                <input class="form-control" type="text" name="numero2" id="numero2">
            </div>
            
            <input class="form-control" type="submit" value="Enviar">
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>