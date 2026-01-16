<!doctype html>
<html lang="es-ES">
    <head>
        <title>Calculadora</title>
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

    <body>
        
        <div class="container-flud w-50 mx-auto my-5">

            <!-- las líneas que empiezan por @ son directivas blade -->
            <form class="form bg-info-subtle rounded shadow p-5" action="/calculadora" method="POST">
                
                <div class="text-center bg-info rounded shadow-sm p-2 mb-3">
                    <h1>Dame dos números y un simbolo</h1>
                </div>

                @csrf  {{-- ver código fuente --}}

                <div class="mb-3">
                    <label for="numero1" class="form-label">Número 1:</label>
                    <input type="text" name="numero1" id="numero1" value="1" class="form-control"><br>
                </div>

                <div class="mb-3">
                    <label for="simbolo" class="form-label">Simbolo:</label>
                    <select name="simbolo" id="simbolo" class="form-select">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="numero2" class="form-label">Número 2:</label>
                    <input type="text" name="numero2" id="numero2" value="1" class="form-control"><br>
                </div>
                
                <div class="mb-3">
                    <input type="submit" value="Enviar" class="btn btn-primary">
                </div>

            </form>

            @if(isset($resul))
                <div class="text-center my-5 py-2 bg-light shadow rounded">
                    <h3>Resultado de la operacion: {{$resul}}</h3>
                </div>
            @endif

        </div>





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
