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
        

        /* Destructor */
        public function __destruct() /* Se borran con unset(), cuando se termina el script se ejecuta */
        {
            echo "El restaurante '{$this->nombre}' ha sido eliminado.<br>";
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



        /* Añadir más de un ratings */
        public function addsRating($r = [])
        {
            /* Asegúrate de que el argumento sea un array. */
            if (!is_array($r)) 
            {
                echo "Error: Se esperaba una lista (array) de ratings.<br>";

            } else 
            {
                foreach ($r as $r) 
                {
                    if ($r < 1 || $r > 5) 
                    {
                        echo "El rating individual '$r' debe estar comprendido entre 1 y 5. No se ha añadido.<br>";

                    } else 
                    {
                        $this->ratings[] = $r;
                    }
                }
            }

        }



        /* Calcular el rating medio */
        public function ratingMedio()
        {
            if (empty($this->ratings)) {
                return 0;
            }

            $resultado = array_sum($this->ratings) / count($this->ratings);
            return (round($resultado));
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
    echo "El rating medios es: ", $restaurante->ratingMedio(), "<br>";
    

    $r1 = new Restaurante("Mediterraneo", "Tapas");
    $r1->toString(); 
    $r1->mostrarRating(); /* Debe de da error, porque no tiene ratings añadidos */

    $r2 = new Restaurante("Gallo Pinto", "Checa");
    $r2->toString();
    $r2->addRating(5);
    $r2->addsRating([4,4,4,3,2]);
    $r2->mostrarRating();
    echo "El rating medios es: ", $r2->ratingMedio(), "<br>";

    echo "<br>";