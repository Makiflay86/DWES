<!doctype html>
<html lang="es-ES">
    <head>
        <title>AybarRomero_Francisco_Examen</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
            .form-text 
            {
                visibility: hidden;
            }
        </style>
    </head>

    <body class="container-fluid w-50">

        <form id="form1" action="libreria_examen.php" method="post" class="my-2 p-5 rounded bg-primary-subtle">
            <h3 class="mb-3 text-center">
                Introduce dos cadenas y te calculo la distancia Hamming entre ellas
            </h3>
            <hr class="mb-5">

            <div class="mb-3">
                <label for="cadena1">Cadena 1:</label>
                <input type="text" id="cadena1" name="cadena1" required>
                <div id="cadena1Help" class="form-text text-danger">Escribe un texto válido.</div>
            </div>
            <div class="mb-3">
                <label for="cadena2">Cadena 2:</label>
                <input type="text" id="cadena2" name="cadena2" required>
                <div id="cadena2Help" class="form-text text-danger">Escribe un texto válido.</div>
            </div>
            <div class="mb-3">
                <label>¿Es caseSensitive?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="convertir" id="si" value="si" checked>
                    <label class="form-check-label" for="si">
                        Si
                    </label>
                </div>
    
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="convertir" id="no" value="no">
                    <label class="form-check-label" for="no">
                        No
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>




    
        <!-- Bootstrap JavaScript Libraries -->
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
        <script src="./validaciones.js"></script>
    </body>
</html>
