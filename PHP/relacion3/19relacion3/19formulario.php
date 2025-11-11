<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Menús Sugeridos</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php
        // BLOQUE DE DEFINICIÓN DE VARIABLES NECESARIAS PARA EL CÓDIGO INMEDIATO
        // Las variables $menu y $n_menus_a_generar deben definirse AQUÍ para que el título y el bucle las encuentren.
        $menu = 
        [
            'entrante' => ['Ensalada César', 'Hummus', 'Boquerones al natural'],
            'primero' => ['Gazpachuelo', 'Salmorejo', 'Ajo Blanco'],
            'segundo' => ['Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'],
            'postre' => ['Helado 3 sabores', 'Flan', 'Tarta de Queso']
        ];
        $n_menus_a_generar = 3; 
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Generador de <?php echo $n_menus_a_generar; ?> Menús Aleatorios</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                    // --- BUCLE PRINCIPAL PARA GENERAR N MENÚS ---
                    // Usa las variables definidas justo al inicio del body.
                    for ($i = 1; $i <= $n_menus_a_generar; $i++) 
                    {
                        // La función se define más abajo, pero PHP la carga (esto es correcto).
                        generar_y_mostrar_menu($menu, $i); 
                    }
                ?>
            </div>
        </div>
    </div>
    
    <?php
        // BLOQUE DE DEFINICIÓN DE LA FUNCIÓN (MANTENIDO ABAJO SEGÚN TU SOLICITUD)
        function generar_y_mostrar_menu($menu, $numero_menu) 
        {
            // Array para almacenar la selección de platos
            $menu_sugerido = [];
            
            // Iterar sobre cada categoría del menú (entrante, primero, etc.)
            foreach ($menu as $categoria => $platos) 
            {
                // Seleccionar una clave (índice) aleatoria de la categoría
                $clave_aleatoria = array_rand($platos);
                
                // Obtener el plato usando la clave aleatoria
                $plato_seleccionado = $platos[$clave_aleatoria];
                
                // Almacenar el plato en el menú sugerido
                $menu_sugerido[$categoria] = $plato_seleccionado;
            }

            // --- IMPRIMIR CARD DE BOOTSTRAP ---
            
            echo '<div class="card border-info shadow mt-4 mb-4">';
            echo '  <div class="card-header bg-info text-white">';
            echo '      <h5 class="mb-0">Menú Sugerencia #' . $numero_menu . '</h5>';
            echo '  </div>';
            echo '  <ul class="list-group list-group-flush">';
            
            // Mostrar cada plato del menú sugerido
            foreach ($menu_sugerido as $categoria => $plato) 
            {
                // Formatear la categoría (e.g., "entrante" a "Entrante")
                $categoria_display = ucfirst($categoria);
                
                echo '    <li class="list-group-item">';
                echo '      <strong>' . $categoria_display . ':</strong> ' . $plato;
                echo '    </li>';
            }
            
            echo '  </ul>';
            echo '</div>';
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>