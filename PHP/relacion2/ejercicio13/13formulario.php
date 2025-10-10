<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 13 - Formulario</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 p-5 col-4">
        <form action="13calculo-nota.php" onsubmit="return validarFormularioNota()">
            <h3 class="text-center  text-info-emphasis">Script con 2 arrays asociativas</h3>
            
            <div class="mb-3">
                <label class="form-label" for="nombre">Introduce el nombre: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Francisco Aybar" name="nombre" id="nombre">
                <div id="nombreHelp" class="form-text text-danger"></div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="correo">Introduce el email: </label>
                <input class="form-control" type="text" placeholder="faybrom2408@g.educaand.es" name="correo" id="correo">
                <div id="correoHelp" class="form-text text-danger"></div>
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="nota1">Introduce nota 1: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" step="1" placeholder="0" name="nota1" id="nota1">
                <div id="nota1Help" class="form-text text-danger"></div>
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="nota2">Introduce nota 2: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" step="1" placeholder="0" name="nota2" id="nota2">
                <div id="nota2Help" class="form-text text-danger"></div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="falta">Introduce las faltas: <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" step="1" placeholder="0" name="falta" id="falta">
                <div id="faltaHelp" class="form-text text-danger"></div>
            </div>
            
            <input class="form-control" type="submit" value="Enviar">
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>