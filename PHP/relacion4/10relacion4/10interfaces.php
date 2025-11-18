<?php
    interface Encendible
    {
        function encender();
        function apagar();
    }

    class Bombilla implements Encendible /* Implementa la interfaz encendible */
    {
        public function  __construct
        (
            private string $tipoBombilla,
            private float $lumenes,
            private bool $encendida = false
        ) {}

        public function __destruct()
        {
            
        }

        public function encender()
        {
            $this->encendida = true;
        }

        public function apagar()
        {
            $this->encendida = false;
        }
        
    }