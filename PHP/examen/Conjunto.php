<?php
    class Conjunto
    {
        
        private array $set; /* array de enteros */
        private int $maxItems; /* tamaño maximo del conjunto */
        private int $items; /* número de elementos actuales en el conjunto */
        


        /* Constructor */
        public function __construct (int $items, array $set = [], int $maxItems = 0)
        {
            $this->items = $items;
            $this->set = $set;
            $this->maxItems = $maxItems;
        }


        public function __destruct() {}



        /* Pasar a string el conjunto */
        public function pasarAString(Conjunto $c)
        {
            $array = (array) $c;
            
            return var_dump($array);
        }



        /* Incluir elemento */
        public function incluir(array $array)
        {
            for ($i = 0; $i < count($array); $i++)
            {
                
                $this->set[] = $array[$i];
            }
        }



        /* Esta incluido */
        public function incluido(int $elemento)
        {
            $resultado = false;

            foreach ($this->set as $r)
            {
                if ($r == $elemento)
                {
                    $resultado = true;
                }
            }

            
            return $resultado;
        }



        /* interseccion, devolver los elemento en común */
        public function interseccion(Conjunto $c2)
        {
            $incluidos = "";
            $ele2 = [];

            foreach ($c2->set as $r)
            {
                $ele2[] = $r;
            }

            for ($i = 0; $i < count($ele2); $i++)
            {
                $a = $this->set ;
                if ($a[$i] == $ele2[$i])
                {
                    $incluidos = "$incluidos $ele2[$i] ";
                }
            }

            return $incluidos;
        }


    }

    echo "<br><br>";


    /* Creo un conjunto con los siguiente valores */
    $c1 = new Conjunto(5, [1,2,3]);
    echo $c1->pasarAString($c1);

    
    echo "<br><br>";

    
    /* d. Un método incluir, que añada un elemento al conjunto (en caso de que no
    estuviera ya) */
    $c1->incluir([5,4,9,1,4]);
    echo $c1->pasarAString($c1);

    
    echo "<br><br>";


    /* e. Un método incluido, que tenga como parámetro un elemento y devuelva
    true o false si ese está o no incluido en el conjunto, respectivamente */
    if ($c1->incluido(25))
    {
        echo "Esta incluido.";

    } else 
    {
        echo "NO Esta incluido.";
    }


    echo "<br><br>";


    /* f. Un método intersección que utilice otro conjunto como parámetro, y
    devuelva los elementos en común (otro conjunto) */
    $c2 = new Conjunto(50, [1,2,3,4]);
    echo $c1->interseccion($c2);


    echo "<br><br>";
