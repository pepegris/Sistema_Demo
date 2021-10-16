<?php

/* $conn_string = "host=ec2-34-202-54-225.compute-1.amazonaws.com port=5432 dbname=d7n0493g0lg7gc user=txzlwvlnufptva password=18a749721241a5aa82818a7c77158c437b05238e9964224ac4615b469bd2ffd5"; */
$conn_string = "host=localhost port=5432 dbname=demo user=postgres password=753159*";
$conn = pg_connect($conn_string);


// Comprobamos la conexión
if (!$conn) {
    die("La conexión ha fallado: " . pg_connection_status($conn));
}





?>