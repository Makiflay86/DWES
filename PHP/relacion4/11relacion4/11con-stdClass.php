<?php
    /* Creo un objeto de la clase "comodín" stdClass */
    $miModulo = new stdClass();
    echo "<h3>objeto vacío</h3>";
    var_dump($miModulo);

    echo "<br><br>";

    /* Voy creando atributos sobre la marcha */
    $miModulo->nombre = "Desarrollo web en Entorno Servidor";
    $miModulo->acronimo = "DWES";
    $miModulo->curso = 2;
    echo "<h3>objeto con atributos</h3>";
    /* Este es el aspecto que tiene ahora el objeto */
    var_dump($miModulo);

    echo "<br><br>";

    /* Convierto explicitamente en array */
    $miModuloArray = (array) $miModulo;
    echo "<h3>objeto convertido a array</h3>";
    var_dump($miModuloArray);
    
    echo "<br><br>";
    
    /* Vamos a serializar miModuloArray */
    $miModuloArraySerializado = serialize($miModuloArray);
    echo "<h3>array serializada</h3>";
    var_dump($miModuloArraySerializado);

    echo "<br><br>";

    /* Convierto explicitamente en objeto el array */
    $miModuloOtraVezObjeto = (object) $miModulo;
    echo "<h3>objeto convertido a objeto de nuevo</h3>";
    var_dump($miModuloOtraVezObjeto);

    echo "<br><br>";

