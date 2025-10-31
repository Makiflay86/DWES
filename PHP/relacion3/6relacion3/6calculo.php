<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 6 - Cálculo</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .form-text 
        {
            visibility: hidden;
        }
    </style>
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 p-5 col-4">
        <?php
            $tirada = $_GET["tiradas"];

            $arrayNumSinTrucar = [];
            $countSinTrucar = array_count_values($arrayNumSinTrucar);

            $arrayNumTrucado = [];
            $countTrucado = array_count_values($arrayNumTrucado);


            // Bucle para tirar el dado tantas veces como se había indicado
            for ($i = 0; $i < $tirada; $i++)
            {
                $arrayNumSinTrucar[$i] = cara();
            }
            for ($i = 0; $i < $tirada; $i++)
            {
                $arrayNumTrucado[$i] = caraTrucada();
            }
            


            // Número random entre 1 y 6
            function cara()
            {
                return (rand(1,6));
            }
            function caraTrucada()
            {
                $num = rand(1,9);

                if ($num >= 6)
                {
                    $num = 6;
                }

                return $num;
            }



            // Mostrar los datos
            echo "<h4>Tirada de los dados sin trucar</h4>";

            foreach ($arrayNumSinTrucar as $n)
            {
                echo "$n ";
            }
            echo "<br><br><h4>Conteo de los dados sin trucar</h4>";
            foreach ($countSinTrucar as $l => $t)
            {
                echo `La cara $l ha sacado $t veces.<br>`;
            }



            echo "<br><br><h4>Tirada de los dados trucados</h4>";
            foreach ($arrayNumTrucado as $n2)
            {
                echo "$n2 ";
            }
            echo "<br><br><h4>Conteo de los dados trucados</h4>";
            foreach ($countTrucado as $l2 => $t2)
            {
                echo `La cara $l2 ha sacado $t2 veces.<br>`;
            }
        ?>

        <div class="mt-5">
            <a href="../6relacion3/6formulario.php"><input type="button" class="btn btn-primary" value="<- Volver"></a>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script src="./validaciones.js"></script>
</body>
</html>