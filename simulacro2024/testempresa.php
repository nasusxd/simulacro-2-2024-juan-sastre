<?php
include_once ("Cliente.php");
include_once ("Moto.php");
include_once ("Venta.php");
include_once ("Empresa.php");
include_once ("MotoNacional.php");
include_once ("MotoImportada.php");
 function arrayString($array){
    $retorno="";
    $coleccion=$array;
    for($i=0;$i<count($coleccion);$i++){
        $retorno.= $coleccion[$i] . "\n";
        $retorno.="---------------------";
    }
    return $retorno;
}
$objCliente1=new Cliente("juan","sastre",true,"dni",44516645);
$objCliente2=new Cliente("pedro","andujar",true,"dni",45665789);
$objMoto1=new MotoNacional(11,2230000,2022,"Benelli Imperiale 400 ",85,true);
$objMoto1->setDescuento(10);
$objMoto2=new MotoNacional(12,584000 ,2021,"Zanella Zr 150 Ohc",70,true);
$objMoto2->setDescuento(10);
$objMoto3=new MotoNacional(13,999900,2023,"Zanella Patagonian Eagle 250",55,false);
$objMoto4=new MotoImportada(14,12499900,2020,"Pitbike Enduro Motocross Apollo Aii 190cc,Plr",100,true,"francia",6244400);
$objEmpresa=new Empresa("alta gama","Av Argenetina 123",[$objCliente1,$objCliente2],[$objMoto1,$objMoto2,$objMoto3,$objMoto4],[]);
$colCodigosMoto=[11,12,13,14];
$objEmpresa->registrarVenta($colCodigosMoto, $objCliente2);
echo $objEmpresa;
$colCodigosMoto=[13,14];
$objEmpresa->registrarVenta($colCodigosMoto, $objCliente2);
echo $objEmpresa;
$colCodigosMoto=[14,2];
$objEmpresa->registrarVenta($colCodigosMoto, $objCliente2);
echo $objEmpresa;
$venta=$objEmpresa->InformarSumaVentasNacionales();
echo $venta  ;
$arrayVentas=$objEmpresa->informarVentasImportadas();
$cadena=arrayString($arrayVentas);
 echo $cadena;