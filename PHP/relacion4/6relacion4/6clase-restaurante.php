<?php

use function PHPSTORM_META\map;

    class Restaurante
    {
        private string $nombre;
        private string $tipoCocina;
        private array $ratings; /* entre 1 y 5 */

        private static int $numeroRest = 0;
        


        /* Constructor con solo los parámetros del nombre y el tipo de cocina,
           el ratings en vacio */
        public function __construct($nombre, $tipoCocina)
        {
            $this->nombre = $nombre;
            $this->tipoCocina = $tipoCocina;
            $this->ratings = [];

            self::$numeroRest++;
        }
        /* Nos podemos ahorrar lo de arriba haciendo esto */
        /* public function __construct
        (
            public string $nombre,
            public string $tipoCocina,
            public array $ratings = []
        ) {
            self::$numeroRest++;  
          } */



        /* Destructor */
        public function __destruct() /* Se borran con unset(), cuando se termina el script se ejecuta */
        {
            self::$numeroRest--; /* Reducir el contador de los objetos creados, ya que se estan eliminando */
            echo "El restaurante '", self::getNombre(), "' ha sido eliminado.<br>"; /* No hace falta poner nada aquí */
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

        /* Mostrar con get y setear con set el tipo de cocina */
        public function getTipoCocina()
        {
            return ($this->tipoCocina);
        }
        public function setTipoCocina($t)
        {
            $this->tipoCocina = $t;
        }

        /* Mostrar con get el array ratings */
        public function getRatings()
        {
            return $this->ratings;
        }



        /* Mostrar los datos */
        public function toString() /* Con __toString() se ejecuta solo sin tener que llamarlo */
        {
            echo "
                Restaurante: ", self::getNombre()," - Tipo de Cocina: ", self::getTipoCocina(), "<br>
            ";
        }


        /* Añadir un rating */
        public function addRating($r) /* Tambien se puede usar array.push */
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
        public function addsRating($r = []) /* Tambien se puede usar array.merge */
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
            if (empty(self::getRatings())) {
                return 0;
            }

            $resultado = array_sum(self::getRatings()) / count(self::getRatings());
            return (round($resultado));
        }



        /* Mostrar rating */
        public function mostrarRating()
        {
            if (empty(self::getRatings()))
            {
                echo "ERROR: Ratings esta vacío.<br>";

            } else 
            {
                echo "Ratings: ";
                foreach (self::getRatings() as $valor) 
                {
                    echo " $valor ";
                }
                echo "<br>";
            }
        }



        public static function totalRests()
        {
            echo "Total de objetos creado: ", self::$numeroRest;
        }



    }



    


    /* Ejemplos */
    $restaurante = new Restaurante("Pizzorante Bellavista", "Italiana");
    $restaurante->addRating(5);
    $restaurante->addRating(4);
    $restaurante->addRating(3);
    $restaurante->toString();
    $restaurante->mostrarRating();
    echo "El rating medio es: ", $restaurante->ratingMedio(), "<br>";
    
    echo "<br>==============================<br><br>";

    $r1 = new Restaurante("Mediterraneo", "Tapas");
    $r1->toString(); 
    $r1->mostrarRating(); /* Debe de da error, porque no tiene ratings añadidos */

    echo "<br>==============================<br><br>";

    $r2 = new Restaurante("Gallo Pinto", "Checa");
    $r2->toString();
    $r2->addRating(5);
    $r2->addsRating([4,4,4,3,2]);
    $r2->mostrarRating();
    echo "El rating medio es: ", $r2->ratingMedio(), "<br>";

    echo "<br>==============================<br><br>";

    Restaurante::totalRests();
    echo "<br>";

    echo "<br>==============================<br><br>";

    unset($restaurante);
    unset($r1);
    unset($r2);

    echo "<br>==============================<br><br>";
    
    Restaurante::totalRests();