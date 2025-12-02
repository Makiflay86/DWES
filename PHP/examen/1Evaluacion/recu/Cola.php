<?php
class Cola
{
    private array $cola;
    private int $longitud;
    private int $elementos;



    public function __construct(int $longitud, array $cola = [], int $elementos = 0)
    {
        $this->longitud = $longitud; 
        $this->cola = $cola;     
        $this->elementos = $elementos;    
    }



    public function __toString()
    {
        return '{' . implode(', ', $this->cola) . '}';
    }



    public function ponerEnCola(int $ele)
    {
        if ($this->elementos >= $this->longitud)
        {
            return "null";

        } else 
        {
            $this->cola[] = $ele;
            $this->elementos++;
        }
    }



    public function extraerDeCola()
    {
        $devolver = "";

        if ($this->elementos <= 0)
        {
            $devolver = "null";

        } else 
        {
            $devolver = array_pop($this->cola);


            $this->elementos--;
        }

        return $devolver;
    }
    


    public function getElementos()
    {
        return $this->elementos;
    }











}