<?php

$conn_string = "host=localhost port=5432 dbname=sis_control user=postgres password=753159*";
$conn = pg_connect($conn_string);


// Comprobamos la conexión
if (!$conn) {
    die("La conexión ha fallado: " . pg_connection_status($conn));
}





?>