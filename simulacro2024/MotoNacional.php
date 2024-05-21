<?php
include_once("Moto.php");
class MotoNacional extends Moto
{
    private $descuento;

    public function __construct($codMoto,$costoMoto,$anioMoto,$descripMoto,$porceMoto,$actMoto)
    {
        parent::__construct($codMoto,$costoMoto,$anioMoto,$descripMoto,$porceMoto,$actMoto);
       $this->descuento = 15;
    }

   
    public function getDescuento()
    {
        return $this->descuento;
    }

    
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;

    }

    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena.= "\nDescuento por moto nacional: ". $this->getDescuento()."%\n";
        return $cadena;
    }
}
