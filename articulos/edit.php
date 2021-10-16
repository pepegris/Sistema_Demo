<?php
require '../includes/conexion.php';
 $art_des=''; 
 $co_art=''; 
 $ref_art=''; 
 $stock=''; 

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM art WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $art_des=$row['art_des']; 
    $co_art=$row['co_art']; 
    $ref_art=$row['ref_art']; 
    $stock=$row['stock']; 
    
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
    $art_des=$_POST['art_des']; 
    $co_art=$_POST['co_art']; 
    $ref_art=$_POST['ref_art']; 
    $stock=$_POST['stock']; 
  

  $query = "UPDATE art set art_des = '$art_des', co_art = '$co_art', ref_art = '$ref_art', stock = '$stock' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Edit Updated Successfully';
  $_SESSION['message_type'] = 'warning *EDITANDO*';
  header('Location: articulos.php');
}

?>
<?php  include '../includes/header.php'; 
      //include 'php/menu.php'; ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <h3>Editando Articulo Nº <?=$id?></h3>
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input type="text" name="art_des"  class="form-control" value="<?php echo $art_des; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <input type="text" name="co_art"   class="form-control" value="<?php echo $co_art;?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <input type="number" name="ref_art"  class="form-control" value="<?php echo $ref_art;?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <input type="number" name="stock" class="form-control" value="<?php echo $stock;?>" placeholder="Update Title">
        </div>
        <button class="btn btn-primary" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php /* include('php/footer.php'); */ ?>
