<?php


$servername = "localhost"; // Nombre/IP del servidor
$database = "fiscal"; // Nombre de la BBDD
$username = "root"; // Nombre del usuario
$password = ""; // Contraseña del usuario
// Creamos la conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Comprobamos la conexión
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}






?>