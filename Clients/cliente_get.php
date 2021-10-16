<?php require '../includes/log.php';





if (isset($_POST)) {
	
require '../includes/conexion.php';
require '../includes/empresa.php';
$nombre=$_POST['nombre'];

if ($conn) {
	
	$consulta = "SELECT * FROM clientes WHERE nombre LIKE '%$nombre%'";
	$buscar = pg_query($conn,$consulta);
	$datos=pg_fetch_assoc($buscar);

	
	$id=$datos['id'];
	$nombre=$datos['nombre'];
		$m_nombre = ucwords($nombre);
	$ci=$datos['ci'];
	$numero=$datos['numero'];
	$email=$datos['email'];    
	$direccion=$datos['direccion'];   
	$informe=$datos['informe'];  
	$deuda=$datos['deuda'];  
// $fecha=$datos['fecha']; 

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/fondo.css">
    
    <title>Registrar</title>
</head>
<style>

#body{
    height: 100vh;
  
    
    display: flex;
    align-items: center;
    justify-content: center;
    

}
form{
  border-radius: 10px;  
  background-color:  rgba(29, 27, 27, 0.205);
  box-shadow: 2px 2px 5px #999;
  width: 42%;
}
form .fieldset{
  margin-left: 35px;
}
form .fieldset .form-group input{
  width: 60%;
}
form .fieldset .form-group span{
  color: red;
}
    
</style>
<?php


require_once '../includes/header.php';
require_once '../includes/menu.php';

?>
<body>


<!-- $nombre=$datos['nombre'];
	$ci=$datos['ci'];
	$numero=$datos['numero'];
	$email=$datos['email'];    
	$direccion=$datos['direccion'];   
	$informe=$datos['informe'];  
	$deuda=$datos['deuda'];  
 -->
 
<div id="body">

	<div class="card text-white bg-primary" style="max-width: 20rem;">
	
	<center><div class="card-header"><h3><?=$m_nombre?></h3></div></center>
	<div class="card-body">
		<center><h5 class="card-title">Informacion</h5></center>
		
		<p>CI/RIF: <?=$ci?><hr>
		Tlf: <?=$numero?><hr>
		email: <?=$email?><hr>
		Dir: <?=$direccion?><hr></p>

		<p class="card-text"><?=$informe?></p>
	</div>

</div>
<?php } ?>


</body>
</html>









