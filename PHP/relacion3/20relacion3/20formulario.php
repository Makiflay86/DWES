<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 20 - Formulario</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .form-text {
            color: #ff0000; /* Siempre visible y rojo para el feedback */
        }
    </style>
</head>
<body>
    <?php
    // --- LÓGICA PHP: DEFINICIÓN DE VARIABLES Y PROCESAMIENTO ---

    $radio = ''; // Valor por defecto
    $mensaje_resultado = '';
    $clase_alerta = 'alert-info';
    $procesado_ok = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // 1. SANITIZACIÓN: Limpiamos la entrada para aceptar solo números y coma/punto.
        // FILTER_SANITIZE_NUMBER_FLOAT permite dígitos, coma y punto.
        $radio_sanitizado = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        // 2. VALIDACIÓN: Comprobamos si el valor sanitizado es un número flotante válido.
        $radio_validado = filter_var($radio_sanitizado, FILTER_VALIDATE_FLOAT);

        // --- VALIDACIÓN COMBINADA (Filter + preg_match) ---
        
        // Ejemplo de REGEX: Comprobar que el número (como string) no tiene más de 6 caracteres totales (incluyendo punto) y es numérico.
        // Aunque FILTER_VALIDATE_FLOAT es suficiente, usamos preg_match como ejemplo.
        $patron_numeric_limit = "/^\d{1,6}(\.\d+)?$/"; 
        
        if ($radio_validado !== false && $radio_validado >= 0) {
            
            // 3. COMPROBACIÓN ADICIONAL (Valor positivo + REGEX de longitud)
            if (preg_match($patron_numeric_limit, (string)$radio_validado)) {
                
                $radio = (float)$radio_validado; // Convertir a float
                $procesado_ok = true;
                
                // Realizar los cálculos del Ejercicio 12 (usando funciones flecha)
                $circunferencia = fn ($n) => round(2 * M_PI * $n, 2);
                $circulo = fn ($n) => round(M_PI * pow($n, 2), 2);
                $esfera = fn ($n) => round((4 * M_PI * pow($n, 3)) / 3, 2);

                $mensaje_resultado = "✅ **Datos válidos y seguros.** Resultados para Radio $radio:<br>";
                $mensaje_resultado .= "Circunferencia: " . $circunferencia($radio) . "<br>";
                $mensaje_resultado .= "Área del círculo: " . $circulo($radio) . "<br>";
                $mensaje_resultado .= "Volumen de la esfera: " . $esfera($radio);
                $clase_alerta = 'alert-success';

            } else {
                // Falló el preg_match
                $mensaje_resultado = "❌ **Error de seguridad (preg_match):** El número es demasiado largo o no cumple el formato.";
                $clase_alerta = 'alert-danger';
            }
            
        } else {
            // Falló la validación (no es número o es negativo)
            $mensaje_resultado = "❌ **Error de Validación (Filter):** Ingrese un número positivo o cero válido para el radio.";
            $clase_alerta = 'alert-danger';
        }
    }
    // --- FIN DE LA LÓGICA PHP ---
    ?>

    <section class="container border border-warning rounded shadow mt-5 mb-3 p-5 col-4">
        <form id="form1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
            <h3 class="text-center text-info-emphasis pb-3">Cálculo de Radio (Validación Segura)</h3>
            
            <div class="mb-3">
                <label class="form-label" for="texto">Introduce el radio del círculo (positivo): <span class="text-danger"> *</span></label>
                <input class="form-control" type="text" placeholder="Escribe aquí el radio" name="texto" id="texto" value="<?php echo htmlspecialchars($radio) ?>">
                <div id="textoHelp" class="form-text">
                    La validación y sanitización se realizan en el servidor (PHP Filter).
                </div>
            </div>
            
            <input class="form-control btn btn-primary" type="submit" value="Calcular y Validar">
        </form>

        <?php if ($mensaje_resultado): ?>
            <div class="alert <?php echo $clase_alerta; ?> mt-4" role="alert">
                <?php echo $mensaje_resultado; ?>
            </div>
        <?php endif; ?>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>