<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación 3 - Ejercicio 19 - Formulario</title>
    <link rel="shortcut icon" href="../logo-ies-playamar.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php
        // --- 1. CONFIGURACIÓN Y DEFINICIÓN DE VARIABLES ---
        
        $menu = [
            'entrante' => ['Ensalada César', 'Hummus', 'Boquerones al natural'],
            'primero' => ['Gazpachuelo', 'Salmorejo', 'Ajo Blanco'],
            'segundo' => ['Fritura Malagueña', 'Conejo al ajillo', 'Pisto con huevo'],
            'postre' => ['Helado 3 sabores', 'Flan', 'Tarta de Queso']
        ];
        $n_menus_a_generar = 3; 
        
        // Array de imágenes para los primeros platos (asumiendo subcarpeta img/)
        $imagenes_primeros_platos = [
            'Gazpachuelo' => 'img/gazpachuelo.jpg',
            'Salmorejo' => 'img/salmorejo.jpg',
            'Ajo Blanco' => 'img/ajo_blanco.jpeg'
        ];

        // --- 2. FUNCIÓN DE GENERACIÓN Y MOSTRADO ---

        /**
         * Genera y muestra una tarjeta de Bootstrap con un menú sugerido,
         * duplicando la probabilidad de la tercera opción y añadiendo una imagen del primer plato.
         */
        function generar_y_mostrar_menu($menu, $imagenes_primeros_platos, $numero_menu) 
        {
            $menu_sugerido = [];
            $url_imagen_primer_plato = null;
            
            foreach ($menu as $categoria => $platos) 
            {
                
                // 1. Aumentar la probabilidad de la TERCERA opción (índice 2)
                $platos_con_probabilidad = $platos;
                if (isset($platos[2])) 
                {
                    $platos_con_probabilidad[] = $platos[2]; // Duplicar la opción
                }

                // 2. Seleccionar el plato al azar
                $clave_aleatoria = array_rand($platos_con_probabilidad);
                $plato_seleccionado = $platos_con_probabilidad[$clave_aleatoria];
                
                $menu_sugerido[$categoria] = $plato_seleccionado;

                // 3. Capturar la URL de la imagen si es el primer plato
                if ($categoria === 'primero' && array_key_exists($plato_seleccionado, $imagenes_primeros_platos)) {
                    $url_imagen_primer_plato = $imagenes_primeros_platos[$plato_seleccionado];
                }
            }

            // --- IMPRIMIR CARD DE BOOTSTRAP ---
            
            echo '<div class="card border-danger shadow mt-4 mb-4">';
            echo '  <div class="card-header bg-danger text-white">';
            echo '    <h5 class="mb-0">Menú Sugerencia #' . $numero_menu . '</h5>';
            echo '  </div>';
            
            // Insertar la imagen del primer plato
            if ($url_imagen_primer_plato) 
            {
                echo '  <div class="card-body p-2 text-center">';
                echo '    <img src="' . $url_imagen_primer_plato . '" class="img-fluid rounded" alt="' . $menu_sugerido['primero'] . '" style="max-height: 150px; width: auto; object-fit: cover;">';
                echo '  </div>';
            }

            echo '  <ul class="list-group list-group-flush">';
            
            // Mostrar cada plato del menú sugerido
            foreach ($menu_sugerido as $categoria => $plato) 
            {
                $categoria_display = ucfirst($categoria);
                
                // Resaltar la tercera opción si ha salido
                $es_tercera_opcion = $plato === $menu[$categoria][2] ?? false; 
                $clase_resaltada = $es_tercera_opcion ? 'fw-bold text-danger' : '';

                echo '    <li class="list-group-item">';
                echo '      <strong>' . $categoria_display . ':</strong> <span class="' . $clase_resaltada . '">' . $plato . '</span>';
                echo '    </li>';
            }
            
            echo '  </ul>';
            echo '</div>';
        }
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Generador de <?php echo $n_menus_a_generar; ?> Menús Aleatorios con Probabilidad y Imagen</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                    // --- 3. BUCLE PRINCIPAL DE EJECUCIÓN ---
                    for ($i = 1; $i <= $n_menus_a_generar; $i++) 
                    {
                        // Se llama a la función, que ya ha sido definida arriba.
                        generar_y_mostrar_menu($menu, $imagenes_primeros_platos, $i); 
                    }
                ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>