<?php

require 'conexion.php';

		
		

		
$consulta_empresa="SELECT * FROM configuracion";
$empresa=pg_query($conn,$consulta_empresa);

$datos_empresa=pg_fetch_assoc($empresa);

    $empresa=$datos_empresa['empresa'];
    $rif=$datos_empresa['rif'];
    $razon_social=$datos_empresa['razon_social'];
    $numero=$datos_empresa['numero'];
    $direcion=$datos_empresa['direcion'];
    $iva=$datos_empresa['iva'];
    $tasa_dia=$datos_empresa['tasa_dia'];
    
    $tasa=number_format($tasa_dia, 2, ',', '.');

    $consulta_factura="SELECT * FROM factura ";
    $factura=pg_query($conn,$consulta_factura);
    
    $datos_factura=pg_fetch_assoc($factura);
    
        

        if ($datos_factura == null) {
										
            $numero_factura=null;
        }else{

            $numero_factura=$datos_factura['id'];
        }

        



?>