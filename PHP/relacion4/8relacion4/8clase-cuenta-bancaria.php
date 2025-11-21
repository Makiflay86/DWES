<?php
    class CuentaBancaria 
    {
        private $numCuenta; /* El número de la cuenta */
        private $nombre; /* El nombre del titular de la cuenta */
        private $saldo; /* Saldo de la cuenta, default 0€ " */
        private $numOperaciones; /* Número de operaciones realizadas, default 0 */



        /* Constructor */
        public function __construct ($numCuenta, $nombre, $saldo = 0, $numOperaciones = 0)
        {
             $this->numCuenta = $numCuenta;
             $this->nombre = $nombre;
             $this->saldo = $saldo;
             $this->numOperaciones = $numOperaciones;
        }



        /* Destructor */
        public function __destruct()
        {
            
        }



        /* GETTERS */
        /* Devolver el número de cuenta */
        public function getNumCuenta()
        {
            return ($this->numCuenta);
        }

        /* Devolver el nombre de la cuenta */
        public function getNombre()
        {
            return ($this->nombre);
        }

        /* Devoler el saldo de la cuenta */
        public function getSaldo()
        {
            return ($this->saldo);
        }

        /* Devolver las operaciones de la cuenta */
        public function getNumOperaciones()
        {
            return ($this->numOperaciones);
        }



        /* SETTERS */
        public function setNumOperaciones()
        {
            $this->numOperaciones++;
        }



        /* Depositar dinero en la cuenta */
        public function depositarDinero($numCuenta, $cantidad)
        {
            if (empty($numCuenta) || $numCuenta == null)
            {
                echo "ERROR: Debes de introducir un número de cuenta";

            } else if (empty($cantidad) || $cantidad <= 0)
            {
                echo "ERROR: Debes de introducir un cantidad positiva mayor que 0";

            } else 
            {
                echo "Operación realizada, dinero depositado.<br>";

                $this->saldo += $cantidad;
                self::setNumOperaciones();
            }
        }



        /* Extraer dinero de la cuenta */
        public function extraerDinero($numCuenta, $cantidad)
        {
            if (empty($numCuenta) || $numCuenta == null)
            {
                echo "ERROR: Debes de introducir un número de cuenta";

            } else if (empty($cantidad) || $cantidad <= 0)
            {
                echo "ERROR: Debes de introducir un cantidad positiva mayor que 0";

            } else 
            {
                $saldo = self::getSaldo();
                $operacion = $saldo - $cantidad;
                $mensaje = "";

                if ($operacion < 0)
                {
                    $mensaje = "Saldo negativo.";

                } else 
                {
                    $mensaje = "Saldo positivo.";
                }
                echo "Operación realizada, dinero extraido. - $mensaje <br>";
                
                $this->saldo = $operacion;
                self::setNumOperaciones();
            }
        }



        /* toString() */
        public function __toString()
        {
            return "
                -- CUENTA BANCARIA --<br>
                Número de cuenta: ".self::getNumCuenta()."<br>
                Nombre: ".self::getNombre()."<br>            
                Saldo: ".self::getSaldo()."€<br>
                Número de operaciones: ".self::getNumOperaciones()."<br>
            ";
        }



        /* Transferir dinero de una cuenta a otra */
        public static function transferirDinero(CuentaBancaria $cuenta1, CuentaBancaria $cuenta2, $cantidad)
        {
            if ($cantidad <= 0)
            {
                echo "ERROR: Debes de introducir un cantidad positiva mayor que 0";

            } else 
            {
                /* A esta cuenta extraemos el dinero */
                $cuenta1->extraerDinero($cuenta1->getNumCuenta(), $cantidad);
                $cuenta1->setNumOperaciones();

                /* A esta cuenta le ingresamos el dinero */
                $cuenta2->depositarDinero($cuenta2->getNumCuenta(), $cantidad);
                $cuenta2->setNumOperaciones();

                echo "Operación realizada, dinero transferido.<br>";
            }
        }
    }



echo "<h3>Creando una cuenta bancaria</h3>";
$cb1 = new CuentaBancaria(1234, "Francisco S.L", 1500);
echo $cb1;


echo "<br>============================================<br>";


echo "<h3>Sacar dinero</h3>";
echo "Sacar 2000€<br>";
$cb1->extraerDinero(1234, 2000);
echo "<br>$cb1";


echo "<br>============================================<br>";


echo "<h3>Estado actual de la cuenta</h3>";
echo $cb1;


echo "<br>============================================<br>";


echo "<h3>Ingresar dinero</h3>";
echo "Ingresar 1000€<br>";
$cb1->depositarDinero(1234,1000);
echo "<br>$cb1";


echo "<br>============================================<br>";


echo "<h3>Transferir dinero a otra cuenta</h3>";
$cb2 = new CuentaBancaria(33, "Anonimous S.A", 33500);
echo "$cb1<br>";
echo $cb2;

CuentaBancaria::transferirDinero($cb1, $cb2, 501);

echo "<br>$cb1<br>";
echo $cb2;