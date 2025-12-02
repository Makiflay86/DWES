<?php
function sonAmigos(int $num1, int $num2)
{
    $array1 = divisor($num1);
    $array2 = divisor($num2);


    return comparar($array1, $array2, $num1, $num2);
}



/* Sacar el divisor del numero en un array */
function divisor(int $num)
{
    $arr = [];
    for ($i = 1; $i <= $num; $i++) 
    { 
        if ($num % $i == 0)
        {
            array_push($arr, $i);

        }
    }

    array_pop($arr);

    return $arr;
}



/* Compara los dos numeros y devuelve true si son iguales o false si no son iguales */
function comparar(array $ar1, array $ar2, int $n1, int $n2)
{
    $array1_suma = 0;
    $array2_suma = 0;

    for ($i = 0; $i < count($ar1); $i++) 
    { 
        $array1_suma += $ar1[$i];
    }

    for ($i = 0; $i < count($ar2); $i++) 
    { 
        $array2_suma += $ar2[$i];
    }

    if ($array1_suma == $n2 && $array2_suma == $n1)
    {
        return true;

    } else 
    {
        return false;
    }

}