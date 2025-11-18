<?php
    interface Encendible
    {
        public function encender();
        public function apagar();
    }

    class Bombilla implements Encendible /* Implementa la interfaz encendible */
    {
        public function  __construct
        (
            private string $tipoBombilla,
            private float $lumenes,
            private bool $encendida = false
        ) {}



        public function __destruct() {}



        /* Getters */
        public function getTipoBombilla()
        {
            return $this->tipoBombilla;
        }

        public function getLumenes()
        {
            return $this->lumenes;
        }

        public function getEncendida()
        {
            return $this->encendida;
        }



        /* toString() */
        public function __toString()
        {
            return "
                -- Bombilla --<br>
                Tipo de Bombilla: ".self::getTipoBombilla()."<br>
                Lumens: ".self::getLumenes()." vatios<br>
                ¿Esta encendida? ".(self::getEncendida()? "Si": "No")."
            ";
        }



        public function encender()
        {
            $this->encendida = true;
            echo "Bombilla encendida.";
        }



        public function apagar()
        {
            $this->encendida = false;
            echo "Bombilla apagada.";
        }
        
    }



    class Motocicleta implements Encendible /* Implementa la interfaz encendible */
    {
        public function __construct
        (
            private string $matricula, /* Único valor requerido que pedimos */
            private int $gasolina = 0,
            private float $bateria = 2,
            private bool $estado = false
        ) {}



        public function __destruct() {}



        /* Getters */
        public function getGasolina()
        {
            return $this->gasolina;
        }

        public function getBateria()
        {
            return $this->bateria;
        }

        public function getMatricula()
        {
            return $this->matricula;
        }

        public function getEstado()
        {
            return $this->estado;
        }



        /* toString() */
        public function __toString()
        {
            return "
                -- Motocicleta --<br>
                Matricula: ".self::getMatricula()." <br>
                Estado: ".(self::getEstado()?"Encendido" : "Apagado")." <br>
                Gasolina: ".self::getGasolina()." litros<br>
                Batería: ".self::getBateria()." vatios 
            ";
        }



        /* Cargar gasolina */
        public function cargarGasolina($l)
        {
            if ($l <= 0)
            {
                echo "ERROR: Los litros no pueden ser negativos o igual a 0.";

            } else 
            {
                echo "Cargando $l litros de gasolina.";
                $this->gasolina += $l;
            }
        }



        /* Encender la motocicleta, haciendo comprobaciones */
        public function encender()
        {
            if (self::getEstado())
            {
                echo "ERROR: La motocicleta ya se encuentra encendida.";

            } else 
            {
                if (self::getGasolina() <= 0)
                {
                    echo "ERROR: Gasolina insuficiente";

                } else 
                {
                    if (self::getBateria() <= 0)
                    {
                        echo "ERROR: Batería K/O";

                    } else 
                    {
                        echo "Motocicleta encendida.";
                        $this->estado = true;                
                    }
                }
            }
        }



        /* Apagar la motocicleta */
        public function apagar()
        {
            if (self::getEstado())
            {
                echo "Motocicleta apagada.";
                $this->estado = false;

            } else 
            {
                echo "ERROR: La motocicleta ya está apagada.";
            }
        }
        

    }


    /* TESTING */
    /* TEST BOMBILLA */
    echo "TEST BOMBILLA";
    echo "<br><br>============================================================<br>";
    echo "<h3>Creando el objeto Bombilla y lo muestro</h3>";
    $b1 = new Bombilla("Led", "30");
    echo $b1;

    echo "<br><br>====================<br>";

    echo "<h3>Encender Bombilla</h3>";
    $b1->encender();
    echo "<br>";
    echo $b1;

    echo "<br><br>====================<br>";

    echo "<h3>Apagar Bombilla</h3>";
    $b1->apagar();
    echo "<br>";
    echo $b1;

    /* TEST MOTOCICLETA */
    echo "<br><br><br>TEST MOTOCICLETA";
    echo "<br><br>============================================================<br>";
    echo "<h3>Creando el objeto Motocicleta y lo muestro</h3>";
    $m1 = new Motocicleta("0110-MFR");
    echo $m1;

    echo "<br><br>====================<br>";

    echo "<h3>Apagar la motocicleta</h3>";
    $m1->apagar();

    echo "<br><br>====================<br>";
    
    echo "<h3>Encender la motocicleta</h3>";
    $m1->encender();

    echo "<br><br>====================<br>";

    echo "<h3>Añado gasolina</h3>";
    $m1->cargarGasolina(5);
    echo "<br><br>";
    echo $m1;
    
    echo "<br><br>====================<br>";
    
    echo "<h3>Vuelvo a encender la motocicleta</h3>";
    $m1->encender();

    echo "<br><br>====================<br>";
    
    echo "<h3>Apagar la motocicleta</h3>";
    $m1->apagar();
    