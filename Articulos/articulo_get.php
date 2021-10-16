<?php  require '../includes/log.php'; 

if (isset($_POST)) {
    
    
    $co_art=$_POST['co_art'];
    $linea_des=$_POST['linea_des'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/fondo.css">
    
    <title>Inicio</title>
</head>
<style>
    table{
        font-size: 25px;
        border: black solid;
        margin-left: 4%;
        
        
    }
    td{
      color:black;
    }
    
   
</style>

<?php



require_once '../includes/menu.php';

?>
<body>
<br><br>
      <center><h2>Resultado</h2></center>
  <table class="table table-bordered table-hover" id="tblData" >
        <thead style="background-color: black;">
          <tr class="table-secondary">
            <td>n°</td>
            <td>Código</td>
            <td>Linea</td>
            <td>Referencia</td>
            <td>Cantidad</td>
            <td>Descripción</td>
            <td>Accion</td>
          </tr>
        </thead>
        <tbody>
        <?php
         require '../includes/conexion.php';
         
        

            if ($linea_des=='todos') {

              if ($co_art=='') {

                $sql= "SELECT * FROM art  ";
              }else {

                $sql= "SELECT * FROM art where co_art like '%$co_art%' ";

              }

            }else {
              
              if ($co_art=='') {
                
                $sql= "SELECT * FROM art where  linea_des='$linea_des' ";

              }else {

                $sql= "SELECT * FROM art where co_art like '%$co_art%' and linea_des='$linea_des' ";
              }
              
            }
 
            $buscar = pg_query($conn,$sql);

          while($rowC=pg_fetch_array($buscar)) { 
              
            $campo1=$rowC['id'];
            $campo2=$rowC['co_art'];
            $campo3=$rowC['linea_des'];
            $campo4=$rowC['ref_art'];
            $campo5=$rowC['stock']; 
            $campo6=$rowC['art_des'];   
            ?>
          <tr>
            <td><?php echo $campo1; ?></td>
            <td><?php echo $campo2; ?></td>
            <td><?php echo $campo3; ?></td>
            <td><?php echo $campo4; ?>$</td>
            <td><?php echo $campo5; ?></td>
            <td><?php echo $campo6; ?></td>
            <td>
              <a href='edit.php?id=<?php echo $campo1?>' class='btn btn-info'>
                <i class='fas fa-marker'></i>
              </a>
              <a href='delete.php?id=<?php echo $campo1?>' class='btn btn-danger'>
                <i class='far fa-trash-alt'></i>
              </a>
            </td>
          </tr>
          <?php } ?>






   
        </tbody>
      </table>




      <?php

require_once '../includes/excel.php';      

}else {
  header('refresh:1;url= articulos.php');
  exit;
}

?>
</body>
</html>
