<?php

 $conn_string = "host=ec2-23-22-243-103.compute-1.amazonaws.com port=5432 dbname=dd4i4cbbkpbd7v user=iiunqbagsrcnfo password=64ee48171b92117938b6851213ee1d9d781903fe3ae09bad5439b5970b48d1d0 "; 
/* $conn_string = "host=localhost port=5432 dbname=demo user=postgres password=753159*"; */
$conn = pg_connect($conn_string);


// Comprobamos la conexión
if (!$conn) {
    die("La conexión ha fallado: " . pg_connection_status($conn));
}





?>