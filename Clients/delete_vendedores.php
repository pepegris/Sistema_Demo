<?php
 require '../includes/log.php';
require '../includes/conexion.php';

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM vendedores WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'clientes Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: clientes_registrados.php');
}

?>
