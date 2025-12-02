<!doctype html>
<html lang="es-ES">
    <head>
        <title>Probando la clase Cola.php</title>
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
        <h1>Probando la clase cola.php</h1>
        <hr>
        <br>

        <?php
            require_once 'Cola.php';

            echo "<h3>Creamos una cola de tamaño 10</h3>";
            $c1 = new Cola(10);

            echo "<br><hr><br>";

            echo "<h3>Insertamos el elemento 5</h3>";
            echo "<h4>¿Se ha insertado el elemento? -> " . ($c1->ponerEnCola(5)!="null" ? "Si" : "No") . "</h4>";
            echo "<p>" . $c1 . "</p>";

            echo "<br><hr><br>";

            echo "<h3>Insertamos el elemento 3</h3>";
            echo "<h4>¿Se ha insertado el elemento? -> " . ($c1->ponerEnCola(3)!="null" ? "Si" : "No") . "</h4>";
            echo "<p>" . $c1 . "</p>";

            echo "<br><hr><br>";

            echo "<h3>Extraemos un elemento de la cola</h3>";
            echo "<h4>¿Se ha extraído el elemento? -> " . ($c1->extraerDeCola()) . "</h4>";
            echo "<p>" . $c1 . "</p>";

            echo "<br><hr><br>";

            echo "<h3>Mostrar el tamaño de la cola</h3>";
            echo "<h4>Tamaño total de la cola -> " . $c1->getElementos() . "</h4>";

            echo "<br><hr><br>";

            echo "<h3>Mostrar la cola completa</h3>";
            echo "<p>" . $c1 . "</p>";
        ?>
    




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
