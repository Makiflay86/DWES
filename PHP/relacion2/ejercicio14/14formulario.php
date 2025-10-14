<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 2 - Ejercicio 14 - Formulario</title>
    <link rel="shortcut icon" href="./logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./14style.css">
</head>
<body>
    <div class="container">
        <section class="d-flex justify-content-center align-items-center">
            <article class="mt-5 p-5 col-6 bg-primary-subtle rounded shadow">
                <h3 class="mb-5 text-center text-info-emphasis">Calificaciones a partir de un número entero (switch)</h3>

                <form id="form1" action="./14calculo.php"  class="bg-secondary-subtle p-3 rounded shadow">
                    <div class="mb-3">
                        <label class="form-label" for="nota">Introduce la nota: <span class="text-danger"> *</span></label>
                        <input class="form-control" type="text" placeholder="10" name="nota" id="nota">
                        <div id="notaHelp" class="form-text text-danger">La nota debe estar entre 1 - 10.</div>
                    </div>

                    <input class="form-control" type="submit" value="Enviar">
                </form>

            </article>
        </section>


    </div>
    
    <script src="./14validacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>