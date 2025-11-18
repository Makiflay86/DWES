<?php
    class BanderaFranjas 
    {
        private $orientacion; /* Horizontal/Vertical */
        private array $lista; /* de los colores de la define */
        private $nombre; /* por defecto "sin adscripción" */


        /* Constructor */
        public function __construct($orientacion, array $lista, $nombre = "sin adscripción")
        {
            $this->orientacion = strtolower($orientacion);
            $this->lista = $lista;
            $this->nombre = $nombre;
        }



        /* Destructor */
        public function __destruct() /* Se borran con unset(), cuando se termina el script se ejecuta */
        {
            
        }



        /* Mostrar con get y setear con set la horientación */
        public function getOrientacion()
        {
            return ($this->orientacion);
        }
        public function setOrientacion($n)
        {
            $this->orientacion = strtolower($n);
        }



        /* Mostrar con get y setear con set la lista */
        public function getLista()
        {
            return ($this->lista);
        }
        public function setLista($n)
        {
            $this->lista = $n;
        }



        /* Mostrar con get y setear con set el nombre */
        public function getNombre()
        {
            return ($this->nombre);
        }
        public function setNombre($n)
        {
            $this->nombre = $n;
        }



        /* Mostrar la bander con su información, toString() */
        public function mostrarBandera()
        {
            echo "--- Bandera: {$this->nombre} ---<br>";
            echo "Orientación: " . ucfirst($this->orientacion) . "<br>";
            echo "Franjas de colores (de inicio a fin):<br>";
            echo implode(" -> ", $this->lista) . "<br>";
            echo "---------------------------------<br>";
        }



        /* Comparar si una bandera es identica que otra bandera */
        public function sonIdenticas(BanderaFranjas $otraBandera)
        {
            return 
            (
                $this->orientacion === $otraBandera->orientacion &&
                $this->lista === $otraBandera->lista &&
                $this->nombre === $otraBandera->nombre
            );
        }



        /* Comparar dos bandera y decir si tienen la misma franaja en diferentes rotaciones */
        public function mismasFranjasDiferenteOrientacion(BanderaFranjas $otraBandera)
        {
            $mismasFranjas = $this->lista === $otraBandera->lista;
            $diferenteOrientacion = $this->orientacion !== $otraBandera->orientacion;

            return $mismasFranjas && $diferenteOrientacion;
        }



        /* Invertir el orden de color de las franjas */
        public function invertirColores(): void
        {
            $this->lista = array_reverse($this->lista);
            echo "¡Colores de la bandera de {$this->nombre} invertidos!<br>";
        }



        /* Invertir la horientación de las franjas */
        public function invertirOrientacion(): void
        {
            if ($this->orientacion === 'horizontal') {
                $this->orientacion = 'vertical';
            } else {
                $this->orientacion = 'horizontal';
            }
            echo "¡Orientación de la bandera de {$this->nombre} invertida a " . ucfirst($this->orientacion) . "!<br>";
        }

    }





    // 1. Creación de Banderas
    $franjas_francia = ['azul', 'blanco', 'rojo'];
    $franjas_alemania = ['negro', 'rojo', 'amarillo'];

    $bandera_francia = new BanderaFranjas('vertical', $franjas_francia, 'Francia');
    $bandera_italia = new BanderaFranjas('vertical', $franjas_francia, 'Italia'); // Mismas franjas, diferente nombre
    $bandera_francia_h = new BanderaFranjas('horizontal', $franjas_francia, 'Francia'); // Mismas franjas, diferente orientación
    $bandera_alemania = new BanderaFranjas('horizontal', $franjas_alemania, 'Alemania');
    $bandera_default = new BanderaFranjas('horizontal', ['rojo', 'amarillo', 'rojo']); // Nombre por defecto

    // 2. Mostrar Banderas
    echo "--- Mostrar Banderas Iniciales ---<br>";
    $bandera_francia->mostrarBandera();
    $bandera_francia_h->mostrarBandera();
    $bandera_default->mostrarBandera();


    // 3. Comparación de Identidad (sonIdenticas)
    echo "--- Comparación de Identidad ---<br>";
    // Prueba 3.1: Francia vs Italia (Diferente nombre)
    $resultado_3_1 = $bandera_francia->sonIdenticas($bandera_italia) ? "SÍ" : "NO";
    echo "Francia es idéntica a Italia? ({$resultado_3_1})<br>"; // Esperado: NO

    // Prueba 3.2: Francia vs Francia_H (Diferente orientación)
    $resultado_3_2 = $bandera_francia->sonIdenticas($bandera_francia_h) ? "SÍ" : "NO";
    echo "Francia (V) es idéntica a Francia (H)? ({$resultado_3_2})<br>"; // Esperado: NO

    // Prueba 3.3: Bandera invertida vs original (Diferente lista)
    $bandera_francia_copia = new BanderaFranjas('vertical', $franjas_francia, 'Francia');
    $resultado_3_3 = $bandera_francia->sonIdenticas($bandera_francia_copia) ? "SÍ" : "NO";
    echo "Francia es idéntica a su copia? ({$resultado_3_3})<br><br>"; // Esperado: SÍ


    // 4. Comparación por Franjas y Orientación (mismasFranjasDiferenteOrientacion)
    echo "--- Comparación de Franjas y Orientación ---<br>";
    // Prueba 4.1: Francia (V) vs Francia_H (H) -> Mismas franjas, diferente orientación
    $resultado_4_1 = $bandera_francia->mismasFranjasDiferenteOrientacion($bandera_francia_h) ? "SÍ" : "NO";
    echo "Francia (V) tiene las mismas franjas que Francia (H) pero diferente orientación? ({$resultado_4_1})<br>"; // Esperado: SÍ

    // Prueba 4.2: Alemania vs Francia (Diferentes franjas)
    $resultado_4_2 = $bandera_alemania->mismasFranjasDiferenteOrientacion($bandera_francia) ? "SÍ" : "NO";
    echo "Alemania tiene las mismas franjas que Francia pero diferente orientación? ({$resultado_4_2})<br><br>"; // Esperado: NO (Franjas diferentes)


    // 5. Invertir Colores y Orientación
    echo "--- Pruebas de Inversión ---<br>";
    $bandera_alemania->mostrarBandera();

    // 5.1 Invertir Colores
    $bandera_alemania->invertirColores();
    $bandera_alemania->mostrarBandera();
    // Resultado esperado: 'amarillo -> rojo -> negro'

    // 5.2 Invertir Orientación
    $bandera_alemania->invertirOrientacion(); // Pasa de horizontal a vertical
    $bandera_alemania->mostrarBandera();
    // Resultado esperado: Orientación vertical

    $bandera_alemania->invertirOrientacion(); // Pasa de vertical a horizontal
    $bandera_alemania->mostrarBandera();
    // Resultado esperado: Orientación horizontal