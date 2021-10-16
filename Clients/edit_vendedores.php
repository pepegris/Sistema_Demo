<?php
require '../includes/log.php';
require '../includes/conexion.php';



    $nombre='';
    $ci='';
    $numero='';
    $email='';    
    $direccion='';   
   

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM vendedores WHERE id=$id";
  $result = pg_query($conn, $query);
  if (pg_num_rows($result) == 1) {
    $row = pg_fetch_array($result);
    
    $nombre=$row['nombre'];
    $ci=$row['ci'];
    $numero=$row['numero'];
    $email=$row['email'];    
    $direccion=$row['direccion'];   
      
   // $fecha=$row['fecha']; 
    
  }
}

if (isset($_POST['update'])) {

    $id=$_GET['id'];
    $nombre=$_POST['nombre'];
    $ci=$_POST['ci'];
    $numero=$_POST['numero'];
    $email=$_POST['email'];    
    $direccion=$_POST['direccion'];   
   
   // $fecha=$_POST['fecha']; 




  $query = "UPDATE vendedores set nombre = '$nombre', ci = '$ci', numero = '$numero', email = '$email',direccion = '$direccion'  WHERE id=$id";
  pg_query($conn, $query);
  $_SESSION['message'] = 'Edit Updated Successfully';
  $_SESSION['message_type'] = 'warning *EDITANDO*';
  header('Location: vendedores_registrados.php');
}

?>
<?php include '../includes/header.php';
      //include 'php/menu.php'; ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_vendedores.php?id=<?php echo $_GET['id']; ?>" method="POST">

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre"  class="form-control" value="<?php echo $nombre; ?>" placeholder="Name">
        </div>

        <div class="form-group">
          <label for="ci">CI-RIF</label>
        <input type="text" name="ci"   class="form-control" value="<?php echo $ci;?>" placeholder="CI">
        </div>

        <div class="form-group">
          <label for="numero">Telfono</label>
        <input type="text" name="numero"  class="form-control" value="<?php echo $numero;?>" placeholder="Phone">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
        <input type="text" name="email"  class="form-control" value="<?php echo $email;?>" placeholder="Email">
        </div>

        <div class="form-group">
          <label for="direccion">Dir</label>
        <textarea class="form-control" name="direccion" id="exampleTextarea" rows="2"><?php echo $direccion;?></textarea>
        
        </div>

     
        
        <button class="btn btn-primary" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>



</body>
</html>
