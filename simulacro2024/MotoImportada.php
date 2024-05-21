<?php
include_once("Moto.php");
class MotoImportada extends Moto
{

    private $paisOrigen;
    private $impuestos;

    public function __construct($codMoto,$costoMoto,$anioMoto,$descripMoto,$porceMoto,$actMoto, $pais, $im)
    {
        parent::__construct($codMoto,$costoMoto,$anioMoto,$descripMoto,$porceMoto,$actMoto);
        $this->paisOrigen = $pais;
        $this->impuestos = $im;
    }


    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }



    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }


    public function getImpuestos()
    {
        return $this->impuestos;
    }


    public function setImpuestos($impuestos)
    {
        $this->impuestos = $impuestos;
    }

    public function __toString()
    {
        $cadena= parent::__toString();
        $cadena.= "\n---- DATOS POR IMPORTACION ---- \n".
                   "pais de origen: ".$this->getPaisOrigen()."\n".
                   "impuestos: ". $this->getImpuestos()."\n" ;
                   return $cadena;
    }
}
