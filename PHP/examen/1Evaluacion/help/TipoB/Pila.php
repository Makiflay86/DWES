<?php
/**
 * Clase Pila (Stack): LIFO (Last-In, First-Out).
 */
class Pila
{
    // Atributos privados
    private array $pila;       // El array que almacena los elementos
    private int $longitud;     // Tamaño máximo de la pila [cite: 80]
    private int $elementos;    // Número de elementos actuales en la pila [cite: 81]

    /**
     * Constructor: inicia el array a vacío, los ítems a 0 y acepta el tamaño máximo (requerido).
     *
     * @param int $longitud El tamaño máximo que puede tener la pila.
     */
    public function __construct(int $longitud)
    {
        $this->pila = [];     // Iniciar el array a vacío [cite: 83]
        $this->elementos = 0; // Los ítems a 0 [cite: 83]
        $this->longitud = $longitud; // El tamaño máximo [cite: 83]
    }

    /**
     * Añade un elemento a la pila por un extremo (PUSH).
     *
     * @param mixed $elemento El elemento a añadir.
     * @return null Si la pila está llena, o nada en otro caso.
     */
    public function push($elemento)
    {
        // Comprobar si la pila está llena
        if ($this->elementos >= $this->longitud) {
            return null; // Devuelve null si la pila está llena [cite: 85]
        }

        // Añadir el elemento al final del array (comportamiento LIFO)
        $this->pila[] = $elemento;
        $this->elementos++;
        // No devuelve nada en otro caso [cite: 85]
    }

    /**
     * Extrae un elemento de la pila (POP).
     *
     * @return mixed El elemento extraído, o null si la pila está vacía.
     */
    public function pop()
    {
        // Comprobar si la pila está vacía
        if ($this->elementos === 0) {
            return null; // Devuelve null si la pila está vacía [cite: 87]
        }

        // Extraer el último elemento (comportamiento LIFO)
        $elemento_extraido = array_pop($this->pila);
        $this->elementos--;

        return $elemento_extraido; // Devuelve el elemento extraído [cite: 87]
    }

    /**
     * Obtiene el número de elementos almacenado en la pila.
     *
     * @return int El número de elementos.
     */
    public function getElementos(): int
    {
        return $this->elementos; // [cite: 88]
    }

    /**
     * Método mágico para pasar a String que obtiene la pila completa.
     *
     * @return string Representación de la pila (ej: [E1, E2, E3])
     */
    public function __toString(): string
    {
        // Une los elementos del array con una coma y espacio, dentro de corchetes
        return '[' . implode(', ', $this->pila) . ']'; // [cite: 89]
    }
}