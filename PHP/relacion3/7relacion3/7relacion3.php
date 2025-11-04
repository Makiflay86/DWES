<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 7</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <section class="container border border-warning rounded shadow mt-5 p-5 col-4">
        <?php
            $dt = new DateTime();
            echo "<b>DateTime():</b> ", $dt -> format("Y-m-d H:i:s");
            
            echo "<br>";

            $dt = $dt -> add(new DateInterval("PT3H"));
            echo "<b>DateInterval('PT3H'):</b>   ", $dt -> format("Y-m-d H:i:s");

            echo "<br>";

            $dt = new DateTime("2000-01-01");
            echo "<b>DateTime('2000-01-01'):</b> ", $dt -> format("Y-m-d H:i:s");

            echo "<br>";

            $dt2 = new DateTime("2000-01-01");
            $interval = $dt -> diff($dt2);
            echo '<b>$interval = $dt -> diff($dt2):</b> ', $interval -> format("%R%a días");

            echo "<br>";

            echo "<b>checkdate(12, 29, 2024):</b> ";
            echo (checkdate(12, 29, 2024) ? "Si" : "No");
            
            echo "<br>";

            echo "<b>date('d-m-Y'):</b> ", date("d-m-Y");

            echo "<br>";

            echo "<b>date('H:i:s'):</b> ", date("H:i:s");

            echo "<br>";

            echo "<b>date('d-m-Y H:i:s', mktime(23,0,0,12,25,2024)):</b> ", date("d-m-Y H:i:s", mktime(23,0,0,12,25,2024));
            
            echo "<br>";
            
            echo "<b>date('L'):</b> ", date("L") ? "Es un año bisiesto" : "No es un año bisiesto";

            echo "<br>";

            echo "<b>date('z'):</b> ", date("z") + 1, " días han pasado desde que empezó el año.";

            echo "<br>";

            echo "<b>date('t'):</b> ", date("t"), " días tiene el mes actual.";

            echo "<br>";

            echo "<b>date('N'):</b> ", date("N"), " (día de la semana, 1 para lunes, 7 para domingo)";

            echo "<br>";

            echo "<b>date('w'):</b> ", date("w"), " (día de la semana, 0 para domingo, 6 para sábado)";

            echo "<br>";

            echo "<b>date('W'):</b> ", date("W"), " (semana del año)";

            echo "<br>";

            echo "<b>strtotime('+1 day'):</b> ", date("Y-m-d H:i:s", strtotime("+1 day"));

            echo "<br>";

            echo "<b>strtotime('sigiente lunes'):</b> ", date("Y-m-d H:i:s", strtotime("next monday"));

            echo "<br>";

            echo "<b>strtotime('último día de febrero'):</b> ", date("Y-m-d H:i:s", strtotime("last day of february"));

            echo "<br>";

            echo "<b>strtotime('primer día del siguiente mes'):</b> ", date("Y-m-d H:i:s", strtotime("first day of next month"));

            echo "<br>";

            echo "<b>strtotime('último día del siguiente mes'):</b> ", date("Y-m-d H:i:s", strtotime("last day of next month"));

            echo "<br>";

            echo "<b>strtotime('último día de este mes'):</b> ", date("Y-m-d H:i:s", strtotime("last day of this month"));

            echo "<br>";

            echo "<b>strtotime('primer día de este mes'):</b> ", date("Y-m-d H:i:s", strtotime("first day of this month"));
            
            echo "<br>";



            
            function getDiaSemana($fecha) {
                $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                return $dias[date('w', strtotime($fecha))];
            }

            function getMes($fecha) {
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                return $meses[date('n', strtotime($fecha)) - 1];
            }
            echo "<br>";

            echo "<b>Día de la semana (hoy):</b> ", getDiaSemana(date("Y-m-d"));
            
            echo "<br>";

            echo "<b>Mes (hoy):</b> ", getMes(date("Y-m-d"));
        ?>

        <div class="mt-5">
            <button id="pauseButton" class="btn btn-warning shadow-sm border border-black">Pausar</button>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <script>
        let isPaused = false;
        let reloadInterval;
        const pauseButton = document.getElementById('pauseButton');

        // Función que contiene la lógica de recarga
        const reloadLogic = () => {
            // Comprueba si la pestaña está visible
            if (document.visibilityState === 'visible') {
                location.reload();
            }
        };

        // Inicia el intervalo por defecto
        reloadInterval = setInterval(reloadLogic, 1000);

        // Añade el listener al botón
        pauseButton.addEventListener('click', () => {
            isPaused = !isPaused; // Invierte el estado de pausa

            if (isPaused) {
                clearInterval(reloadInterval); // Detiene el intervalo
                pauseButton.textContent = 'Reanudar';
            } else {
                reloadInterval = setInterval(reloadLogic, 1000); // Reanuda el intervalo
                pauseButton.textContent = 'Pausar';
            }
        });
    </script>
</body>
</html>