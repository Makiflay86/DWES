<?php
// La acción apunta a proceso.php y utiliza el método POST para enviar datos de forma segura
echo <<<HTML
<form method="POST" action="proceso.php">
    <h3>Comprobar si los caracteres de una cadena están incluidos en una frase.</h3>
    <div>
        <label for="frase">Dame una frase (Cadena 1):</label>
        <input type="text" id="frase" name="frase" required>
    </div>
    <div>
        <label for="caracteres">Dame una serie de caracteres (Cadena 2):</label>
        <input type="text" id="caracteres" name="caracteres" required>
    </div>
    <div>
        <button type="submit">Enviar</button>
    </div>
</form>
HTML;
?>