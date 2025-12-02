<!doctype html>
<html lang="es-ES">
    <head>
        <title>Formulario</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body class="container-fluid w-50">
        
        <form class="my-3 bg-primary-subtle p-5 rounded shadow border border-black" action="./proceso.php" method="post">
            <h3 class="mb-3 text-center">Introduce dos números enteros y te digo si son amigos</h3>
            <hr>

            <div class="mb-3">
                <label for="num1">Dame una frase:</label>
                <input class="form-control" type="number" id="num1" name="num1" required>
            </div>

            <div class="mb-3">
                <label for="num2">Dame una frase:</label>
                <input class="form-control" type="number" id="num2" name="num2" required>
            </div>

            <div class="mb-3">
                <button class="btn btn-success" type="submit">Enviar</button>
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
    </body>
</html>
