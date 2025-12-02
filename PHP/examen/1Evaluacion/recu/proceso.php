<?php
if ( !isset($_REQUEST['num1'], $_REQUEST['num1'])) 
{
    echo "<h1>ERROR: Debes de introducir los datos correctos</h1>";
    echo '<button type="button"><a href="./formulario.php">Volver</a></button>';

} else 
{
    require_once 'libreria.php';

    $num1 = intval($_POST['num1']);
    $num2 = intval($_POST['num2']);

    if ($num1 == 0 || $num2 == 0)
    {
        echo "<h1>ERROR: Debes de introducir los datos correctos</h1>";
        echo '<button type="button"><a href="./formulario.php">Volver</a></button>';

    } else 
    {
        echo "<h1>proceso.php</h1>";
        echo "<hr>";
        if (sonAmigos($num1, $num2))
        {
            /* echo "Los números introducidos son amigos"; */
            echo "<p>Al llamar a sonAmigos con $num1 y $num2, deberá mostrar: Los números introducidos <b>son amigos</b>.</p>";
    
        } else 
        {
            /* echo "Los números introducidos no son amigos"; */
            echo "<p>Al llamar a sonAmigos con $num1 y $num2, deberá mostrar: Los números introducidos <b>no son amigos</b>.</p>";
        }
    }
    


    

   
}
