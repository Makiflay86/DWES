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
        private static int $contadorMatricula = 0;



        public function  __construct
        (
            private int $gasolina = 0,
            private float $bateria = 2,
            private bool $matricula = self::$contadorMatricula++,
            private bool $estado = false
        ) {}



        public function __destruct() {}



        /* Cargar gasolina */
        public function cargarGasolina($l)
        {
            if ($l < 0)
            {
                
            }
        }



        public function encender()
        {
            $this->estado = true;
        }



        public function apagar()
        {
            $this->estado = false;
        }
        
    }