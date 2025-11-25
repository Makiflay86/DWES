<?php

use function PHPSTORM_META\map;

    if (isset($_REQUEST["cadena1"]) || isset($_REQUEST["cadena2"]))
    {
        $cadena1 = $_REQUEST["cadena1"];
        $cadena2 = $_REQUEST["cadena2"];
        $caseSensitive = $_REQUEST["convertir"];

        
        

        function distanciaHamming($cadena1, $cadena2, $caseSensitive)
        {
            if ($caseSensitive == "si")
            {
                echo "CaseSensitive = Si<br>";
                echo "La cadena 1 es: $cadena1 <br>";
                echo "La cadena 2 es: $cadena2 <br>";
                echo "<br>";
                
                $igual = 0;
                $ar1 = str_split($cadena1);
                $ar2 = str_split($cadena2);
                $len = (count($ar1) > count($ar2)) ? count($ar1) : count($ar2);

                for ($i = 0; $i < $len; $i++)
                {
                    if ($ar1[$i] != $ar2[$i])
                    {
                        $igual++;
                    } 

                }

                echo "Distancia -> $igual";

            } else 
            {
                $cadena1Minus = strtolower($cadena1);
                $cadena2Minus = strtolower($cadena2);
    
                echo "CaseSensitive = No<br>";
                echo "La cadena 1 es: $cadena1 <br>";
                echo "La cadena 2 es: $cadena2 <br>";
                echo "<br>";
                
                $igual = 0;
                $mensaje = "";
                $ar1 = str_split($cadena1Minus);
                $ar2 = str_split($cadena2Minus);
                $len = (count($ar1) > count($ar2)) ? count($ar2) : count($ar2);
                

                if (count($ar1) > count($ar2) || count($ar1) < count($ar2))
                {
                    $igual = -1;
                    $mensaje = "ERROR: Una cadena es más grande que la otra.";

                } else 
                {
                    for ($i = 0; $i < $len; $i++)
                    {
                        if (count($ar1) < $len || count($ar2) < $len)
                        {
                            if ($ar1[$i] != $ar2[$i]) 
                            {
                                $igual++;
        
                            } 
                        }
    
                    }
                }


                echo "Distancia -> $igual <br>";
                echo "$mensaje";
            }

        }

        echo distanciaHamming($cadena1, $cadena2, $caseSensitive);

    }