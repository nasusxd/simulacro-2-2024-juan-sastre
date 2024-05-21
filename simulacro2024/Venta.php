<?php

class Venta
{
    private $numeroVenta;
    private $fecha;
    private $objCliente;
    private $arrayMotos;
    private $precioFinal;

    public function __construct($numVenta, $cliente, $arrayM)
    {
        $this->numeroVenta = $numVenta;
        $this->fecha = date("d-m-Y");
        $this->objCliente = $cliente;
        $this->arrayMotos = $arrayM;
        $this->precioFinal = 0;
    }


    public function getNumeroVenta()
    {
        return $this->numeroVenta;
    }


    public function setNumeroVenta($numeroVenta)
    {
        $this->numeroVenta = $numeroVenta;
    }


    public function getFecha()
    {
        return $this->fecha;
    }


    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public function getObjCliente()
    {
        return $this->objCliente;
    }


    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }


    public function getArrayMotos()
    {
        return $this->arrayMotos;
    }


    public function setArrayMotos($arrayMotos)
    {
        $this->arrayMotos = $arrayMotos;
    }


    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }



    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }
    public function __toString()
    {
        return $this->getNumeroVenta() . "\n" . $this->getFecha() . "\n" . $this->getObjCliente() . "\n" . $this->arrayMotosAString() . "\n" . $this->getPrecioFinal() . "\n";
    }

    public function arrayMotosAString()
    {
        $retorno = "";
        $coleccion = $this->getArrayMotos();
        for ($i = 0; $i < count($coleccion); $i++) {
            $retorno .= $coleccion[$i] . "\n";
            $retorno .= "---------------------";
        }
    }

    public function incorporarMoto($objMoto)
    {

        $objCliente = $this->getObjCliente();
        $activo = $objCliente->getEstadoCliente();
        $disponible = $objMoto->getActiva();

        if ($activo && $disponible) {
            $arrayMotos = $this->getArrayMotos();
            array_push($arrayMotos, $objMoto);
            $this->setArrayMotos($arrayMotos);
            $precioFinal = $this->getPrecioFinal();
            $precioMoto = $objMoto->darPrecioVenta($objMoto);
            $precioFinal = $precioFinal + $precioMoto;
            $this->setPrecioFinal($precioFinal);
        }
    }

    public function retornarTotalVentaNacional()
    {
        $arrayMotos = $this->getArrayMotos();
        $i = 0;
        $cantMotos = count($arrayMotos);
        $acuMotosNacionales = 0;
        while ($i < $cantMotos) {
            $objMoto = $arrayMotos[$i];
            if ($objMoto instanceof MotoNacional) {
                $acuMotosNacionales = +$acuMotosNacionales + $objMoto->darPrecioVenta($objMoto);
            }
            $i++;
        }
        return $acuMotosNacionales;
    }

    public function retornarMotosImportadas()
    {
        $arrayMotos = $this->getArrayMotos();
        $i = 0;
        $cantMotos = count($arrayMotos);
        $arrayMotosImportadas = [];
        while ($i < $cantMotos) {
            $objMoto = $arrayMotos[$i];
            if ($objMoto instanceof MotoImportada) {
                array_push($arrayMotosImportadas, $objMoto);
            }
            $i++;
        }
        return $arrayMotosImportadas;
    }
}
