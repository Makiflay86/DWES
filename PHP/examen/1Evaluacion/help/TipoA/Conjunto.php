<?php
/**
 * Clase Conjunto, simula una estructura de datos de conjunto (set).
 */
class Conjunto
{
    // Atributos privados [cite: 35]
    private array $set;       // Un array de enteros [cite: 36]
    private int $maxItems;    // Un tamaño máximo del conjunto [cite: 37]
    private int $items;       // Un número de elementos actuales en el conjunto [cite: 38]

    /**
     * Constructor: inicia el array a vacío, los ítems a 0 y acepta el tamaño máximo. [cite: 41]
     *
     * @param int $maxItems El tamaño máximo que puede tener el conjunto.
     */
    public function __construct(int $maxItems)
    {
        $this->set = [];     
        $this->items = 0;    
        $this->maxItems = $maxItems; 
    }

    /**
     * Destructor. [cite: 42]
     */
    public function __destruct()
    {
        // El destructor
    }

    /**
     * Método mágico __toString para pasar a string el contenido del conjunto. [cite: 43]
     *
     * @return string Representación del conjunto (ej: {1, 5, 2, 8})
     */
    public function __toString(): string
    {
        return '{' . implode(', ', $this->set) . '}'; // [cite: 43]
    }

    /**
     * Añade un elemento al conjunto (en caso de que no estuviera ya). [cite: 44]
     *
     * @param int $elemento El elemento a añadir.
     * @return bool True si se añadió, false si ya existía o el conjunto está lleno.
     */
    public function incluir(int $elemento): bool
    {
        // No añadir si ya está o si el conjunto ha alcanzado su límite
        if ($this->incluido($elemento) || $this->items >= $this->maxItems) {
            return false;
        }

        $this->set[] = $elemento;
        $this->items++;
        return true;
    }

    /**
     * Comprueba si un elemento está incluido en el conjunto. [cite: 45]
     *
     * @param int $elemento El elemento a buscar.
     * @return bool True o false si ese está o no incluido en el conjunto, respectivamente.
     */
    public function incluido(int $elemento): bool
    {
        return in_array($elemento, $this->set, true);
    }

    /**
     * Devuelve el conjunto de la INTERSECCIÓN con otro conjunto (elementos en común). [cite: 46]
     *
     * @param Conjunto $otro El otro conjunto.
     * @return Conjunto El nuevo conjunto con los elementos comunes.
     */
    public function interseccion(Conjunto $otro): Conjunto
    {
        $max_result_size = $this->maxItems + $otro->maxItems;
        $resultado = new Conjunto($max_result_size);

        // array_intersect encuentra los valores comunes.
        $elementos_comunes = array_intersect($this->set, $otro->set);

        foreach ($elementos_comunes as $elemento) {
            $resultado->incluir($elemento);
        }

        return $resultado;
    }

    /**
     * Devuelve el conjunto de la UNIÓN con otro conjunto (elementos de uno y otro sin repetición). [cite: 47]
     *
     * @param Conjunto $otro El otro conjunto.
     * @return Conjunto El nuevo conjunto.
     */
    public function union(Conjunto $otro): Conjunto
    {
        $max_result_size = $this->maxItems + $otro->maxItems;
        $resultado = new Conjunto($max_result_size);

        // array_merge combina y array_unique elimina duplicados.
        $combinados = array_merge($this->set, $otro->set);
        $elementos_unicos = array_unique($combinados);

        foreach ($elementos_unicos as $elemento) {
            $resultado->incluir($elemento);
        }

        return $resultado;
    }

    /**
     * Devuelve el conjunto de la DIFERENCIA SIMÉTRICA (elementos que NO tienen en común uno y otro). [cite: 48]
     * Implementado como Diferencia Simétrica: (A \ B) U (B \ A)
     *
     * @param Conjunto $otro El otro conjunto.
     * @return Conjunto El nuevo conjunto con los elementos no comunes.
     */
    public function diferencia(Conjunto $otro): Conjunto
    {
        $max_result_size = $this->maxItems + $otro->maxItems;
        $resultado = new Conjunto($max_result_size);

        // Elementos en A que no están en B
        $solo_en_A = array_diff($this->set, $otro->set);

        // Elementos en B que no están en A
        $solo_en_B = array_diff($otro->set, $this->set);

        // Combinar para obtener la diferencia simétrica
        $elementos_diferencia = array_merge($solo_en_A, $solo_en_B);

        foreach ($elementos_diferencia as $elemento) {
            $resultado->incluir($elemento);
        }

        return $resultado;
    }
}