<?php

use function PHPSTORM_META\map;

    class Restaurante
    {
        public $nombre;
        public $tipoCocina;
        public $ratings; /* entre 1 y 5 */
        

        /* Constructor con solo los parámetros del nombre y el tipo de cocina,
           el ratings en vacio */
        public function __construct($nombre, $tipoCocina)
        {
            $this->nombre = $nombre;
            $this->tipoCocina = $tipoCocina;
            $this->ratings = [];
        }


        /* Mostrar los datos */
        public function toString()
        {
            echo "
                Restaurante: $this->nombre - Tipo de Cocina: $this->tipoCocina <br>
            ";
        }


        /* Añadir un rating */
        public function addRating($r)
        {
            if ($r < 1 || $r > 5)
            {
                echo "El rating debe estar comprendido entre 1 y 5.<br>";

            } else 
            {
                $this->ratings[] = $r;
            }
        }


        /* Calcular el rating medio */
        public function ratingMedio()
        {
            $resultado = array_sum($this->ratings) / count($this->ratings);
            
            if (count($this->ratings) == 0) 
            {
                $resultado = null;
            }

            return $resultado;
        }


        /* Mostrar rating */
        public function mostrarRating()
        {
            if (empty($this->ratings))
            {
                echo "ERROR: Ratings esta vacío.<br>";

            } else 
            {
                echo "Ratings: ";
                foreach ($this->ratings as $valor) 
                {
                    echo " $valor ";
                }
                echo "<br>";
            }
        }
    }


    /* Ejemplos */
    $restaurante = new Restaurante("Pizzorante Bellavista", "Italiana");
    $restaurante->addRating(5);
    $restaurante->addRating(4);
    $restaurante->addRating(3);
    $restaurante->toString();
    $restaurante->mostrarRating();

    $r1 = new Restaurante("Mediterraneo", "Tapas");
    $r1->toString();
    $r1->mostrarRating();

    $r2 = new Restaurante("Gallo Pinto", "Checa");
    $r2->toString();