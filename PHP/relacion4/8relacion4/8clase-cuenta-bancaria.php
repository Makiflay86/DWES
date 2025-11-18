<?php
    class CuentaBancaria 
    {
        private $nCuenta; /* El número de la cuenta */
        private $nombre; /* El nombre del titular de la cuenta */
        private $saldo; /* Saldo de la cuenta, default 0€ " */
        private $nOperaciones; /* Número de operaciones realizadas, default 0 */



        /* Constructor */
        public function __construct ($nCuenta, $nombre, $saldo = 0, $nOperaciones = 0)
        {
             $this->nCuenta = $nCuenta;
             $this->nombre = $nombre;
             $this->saldo = $saldo;
             $this->nOperaciones = $nOperaciones;
        }









    }