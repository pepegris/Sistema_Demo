<?php require '../includes/log.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/fondo.css">
    
    <title>clientes</title>
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

@media (max-width: 900px){
 
  form{
    margin-top: 35px;
  border-radius: 10px;  
  background-color:  rgba(29, 27, 27, 0.205);
  box-shadow: 2px 2px 5px #999;
  width: 80%;
}
#buscar{
  display: none;
}  #usuario{
    display: none;
}

}
@media (min-width: 900px){
  #buscar2{
  display: none;
}

}
    
</style>
<?php


require_once '../includes/header.php';
require_once '../includes/menu.php';
include 'includes/ico_buscar.php';

?>
<body>
 
<div id="body">
<form action="cliente_post.php" method="POST" >
  
    <div class="fieldset">
    <br>
    <center><legend>Registrar Cliente</legend></center>
  
    <div class="form-group">
      <label for="nombre" class="form-label mt-2">Nombre</label>
      <input   type="text" name="nombre" class="form-control" id="nombre" placeholder="Name" required>
    </div>
    <div class="form-group">
      <label for="ci" class="form-label mt-2">Cedula - RIF</label>
      <input required name="ci" type="text" class="form-control" id="nombre" placeholder="CI">
    </div>
    <div class="form-group">
      <label for="numero" class="form-label mt-2">Numero</label>
      <input required name="numero"  type="text" class="form-control" id="nombre" placeholder="Phone">
    </div>
    <div class="form-group">
      <label for="email" class="form-label mt-2">Correo</label>
      <input required name="email" type="email" class="form-control" id="nombre" placeholder="cliente@email.com">
    </div>
    <div class="form-group">
      <label for="direccion" class="form-label mt-2">Direccion</label>
      <textarea class="form-control" name="direccion" id="exampleTextarea" style="width: 70%;" rows="2"></textarea>
    </div>
    <div class="form-group">
      <label for="informe" class="form-label mt-2">Informe</label>
      <textarea class="form-control" name="informe" id="exampleTextarea" style="width: 70%;" rows="3"></textarea>
    </div>
    
   
 
    <br>
   
    <center><button type="submit" class="btn btn-success">Save</button></center>
    <br>
    </div>
</form>

</div>

<center><a  href="clientes_registrados.php"  id="buscar2" class="btn btn-warning"  >Buscar Clientes</a>  
</center>



</body>
</html>









