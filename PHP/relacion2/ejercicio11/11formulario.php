<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 11 - Formulario</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 p-5 col-4">
        <form action="11calculo-nota.php">
            <h3 class="text-center text-info-emphasis">Cálcular nota final</h3>
            
            <div class="mb-3">
                <label class="form-label" for="nota1">Introduce nota 1: </label>
                <input class="form-control" type="number" step="0.01" min="0" placeholder="0,00" name="nota1" id="nota1">
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="nota2">Introduce nota 2: </label>
                <input class="form-control" type="number" step="0.01" min="0" placeholder="0,00" name="nota2" id="nota2">
            </div>

            <div class="mb-3">
                <label class="form-label" for="nota3">Introduce nota 3: </label>
                <input class="form-control" type="number" step="0.01" min="0" placeholder="0,00" name="nota3" id="nota3">
            </div>
            
            <input class="form-control" type="submit" value="Enviar">
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>