<?php
require '../includes/conexion.php';
include '../includes/header.php';

$mensaje_error1='';
$mensaje_error2='';
 $art_des=''; 
 $co_art=''; 
 $ref_art=''; 
 $stock=''; 

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM art WHERE id=$id";
  $result = pg_query($conn, $query);
  if (pg_num_rows($result) == 1) {
    $row = pg_fetch_array($result);
    $art_des=$row['art_des']; 
    $co_art=$row['co_art']; 
    $ref_art=$row['ref_art'];
    $linea_des=$row['linea_des']; 
    $stock=$row['stock']; 
    
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
    $art_des=$_POST['art_des']; 
    $co_art=$_POST['co_art']; 
    $ref_art=$_POST['ref_art']; 
    $stock=$_POST['stock'];
    $nombre_imagen = $_FILES['imagen']['name'];
    $tipo_imagen   = $_FILES['imagen']['type'];
    $tam_imagen    = $_FILES['imagen']['size']; 
  

  if ($nombre_imagen==null) {


    $query = "UPDATE art set  co_art = '$co_art',linea_des='$linea_des', ref_art = '$ref_art',art_des = '$art_des', stock = '$stock' WHERE id=$id";

  }else {

    if ($tipo_imagen=="image/jpeg" or $tipo_imagen=="image/jpg" or $tipo_imagen=="image/png" or $tipo_imagen=="image/gif"  ) {

      //ruta del destino del servidor
      $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/Proyecto_Web/log/uploads/img/';

      //almacenando nombre y direccion de la imagen

      $art_img=$co_art.'_'.$nombre_imagen;

   $query = "UPDATE art set  co_art = '$co_art',linea_des='$linea_des', ref_art = '$ref_art',art_des = '$art_des',img1='$art_img', stock = '$stock' WHERE id=$id";

   //mover imagen a directorio temporal
   move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$art_img);

   }else {
     echo"<center><h3>Por favor suba una imagen valida /JPG/JPEG/PNG/GIF: </h3> <p>$tipo_imagen</p>";
     echo "<a href='articulos.php' class='btn btn-danger'>Salir</a></center>";
     pg_lo_close($conn);
                     exit;
 }
    
  }
  pg_query($conn, $query);
  $_SESSION['message'] = 'Edit Updated Successfully';
  $_SESSION['message_type'] = 'warning *EDITANDO*';
  header('Location: articulos.php');
}

?>
<?php 
      //include 'php/menu.php'; ?>

      
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" >
        
        <div class="form-group">
          <label for="co_art">Articulo</label>
        <input type="text" name="co_art"   class="form-control" value="<?php echo $co_art;?>" placeholder="Update">
        </div>
        <div class="form-group">
          <label for="linea_des">Linea</label>
          <select name="linea_des" id=""  style="background-color:white;" placeholder="Código" class="form-control">
                  <option value="<?php echo $linea_des;?>"><?php echo $linea_des;?></option>
                <?php 
                
                $sql_linea="SELECT linea_des FROM linea";
                $consulta_linea=pg_query($conn,$sql_linea);
                
                while ( $res_linea=pg_fetch_array($consulta_linea) ) {

                  $linea=$res_linea['linea_des'];
          
                ?>

                <option value="<?=$linea?>"><?=$linea?></option>

                <?php }; ?>
            </select>
        </div>
        <div class="form-group">
          <label for="ref_art">Referencia</label>
        <input type="number" name="ref_art"  class="form-control" value="<?php echo $ref_art;?>" placeholder="Update">
        </div>
        <div class="form-group">
          <label for="stock">Stock</label>
        <input type="number" name="stock" class="form-control" value="<?php echo $stock;?>" placeholder="Update">
        </div>
        <div class='form-group'> 
          <label for="imagen">Cambiar Imagen</label>         
           <input type='file' class='form-control' name='imagen' size='100' id='' >
        </div>
        <div class="form-group">
          <label for="art_des">Descripción</label>
          <textarea  name="art_des" placeholder="Descripción" class="form-control"  requiredcols='15' rows='3'placeholder="Update" ><?php echo $art_des; ?></textarea>
        </div>
        <button class="btn btn-primary" name="update">
          Update
</button>
      </form>

      </div>
    </div>
  </div>
</div>

