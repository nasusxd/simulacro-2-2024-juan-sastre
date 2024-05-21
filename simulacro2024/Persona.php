<?php 
class Persona{
     
    private $nroDni;
    private $nombre;
    private $apellido;

    public function __construct($dni,$nom,$ape){
        $this->nroDni = $dni;
        $this->nombre = $nom;
        $this->apellido = $ape;
    }
    

    public function getNroDni()
    {
        return $this->nroDni;
    }

  
    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;

       
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

  
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

     
    }

  
    public function getApellido()
    {
        return $this->apellido;
    }

  
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        
    }

    public function __toString()
    {
        return "\nDni : ".$this-> getNroDni() ."\n".
        "\nnombre : ".$this->getNombre() ."\n".
        "\napellido : ".$this->getApellido()."\n";
    }
}