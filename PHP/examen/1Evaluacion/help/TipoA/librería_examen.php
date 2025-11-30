<?php
/**
 * Calcula la distancia Hamming de dos cadenas.
 * La distancia es el número de caracteres diferentes que tienen.
 *
 * @param string $stringA Primera cadena a comparar. [cite: 8]
 * @param string $stringB Segunda cadena a comparar. [cite: 8]
 * @param bool $caseSensitive Si la comparación es sensible a mayúsculas/minúsculas (true por defecto). [cite: 9]
 * @return int La distancia Hamming, o -1 si las longitudes son diferentes. [cite: 10]
 */
function distanciaHamming(string $stringA, string $stringB, bool $caseSensitive = true): int {
    // 1. Comparar la longitud [cite: 10]
    $lenA = mb_strlen($stringA, 'UTF-8');
    $lenB = mb_strlen($stringB, 'UTF-8');

    if ($lenA !== $lenB) {
        return -1;
    }

    $distance = 0;

    // 2. Manejar la sensibilidad a mayúsculas/minúsculas [cite: 5, 6, 9]
    if (!$caseSensitive) {
        // Se usa mb_strtolower para manejar correctamente caracteres multi-byte
        $stringA = mb_strtolower($stringA, 'UTF-8');
        $stringB = mb_strtolower($stringB, 'UTF-8');
    }

    // 3. Calcular la distancia (carácter a carácter) [cite: 3]
    for ($i = 0; $i < $lenA; $i++) {
        $charA = mb_substr($stringA, $i, 1, 'UTF-8');
        $charB = mb_substr($stringB, $i, 1, 'UTF-8');

        if ($charA !== $charB) {
            $distance++;
        }
    }

    return $distance;
}