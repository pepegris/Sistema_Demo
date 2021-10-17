<?php  require '../includes/log.php'; ?>
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
        
        
    }
    form {
        border:black ;
        border-radius: 10px;  
        padding-top:10px;
        background-color:  rgba(29, 27, 27, 0.205);
        box-shadow: 2px 2px 5px #999;
    }
    form button {
        margin: 5px 0 5px 0;
    }
    form .form-group{
      margin-top:5px;
    }
    table td {
      color:black;
    }
    @media (max-width: 900px){
 

.container table #w{
 display: none;
}

.container .row{
 margin-top: 50px;
}
#usuario{
  display: none;
}


}
   
    
</style>
<?php


require_once '../includes/menu.php';
require '../includes/conexion.php';


?>
<body>
 


<div class="container mt-2">
  <div class="row">
    <!-- CARGAR ARTICULO -->
    
    <div class="row">
    <div class="col">
    <h2>Registrar Articulos</h2>
      <div class="card-body">

        <form action="articulo_post.php" method="POST" enctype="multipart/form-data"  >
        <center>
          
          <div class="form-group">
            <input type="text"style="width: 95%;" name="co_art" placeholder="Código" class="form-control" required>
          </div>
          <div class="form-group">
           <select name="linea_des" id="" style="width: 95%; background-color:white;"  placeholder="Código" class="form-control">
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
            <input type="number" style="width: 95%;"  name="ref_art" placeholder="Referencia $" class="form-control" required>
          </div>
          <div class="form-group">
            <input type="number" style="width: 95%;" name="stock" placeholder="Cantidad" class="form-control" required>
          </div>   
         <!--  <div class='form-group'>          
           <input type='file'style="width: 95%;" class='form-control' name='imagen' size='100' id='' required>
          </div> -->
          <div class="form-group">
           <textarea style="width: 95%;" name="art_des" placeholder="Descripción" class="form-control"  requiredcols='15' rows='3' ></textarea>
            
          </div>
      
         <button type="submit" class="btn btn-primary">
            Save
          </button></center>
        </form>
      </div>
     </div>

     
     <div class="col">
     
      <div class="card-body">


      <h2>Registrar Linea Articulo</h2>
        <form action="linea_post.php" method="POST" >
        <center>
          <div class="form-group">
          <label for="linea_des">Agregar Linea</label>
            <input type="text" style="width: 95%;" name="linea_des" placeholder="Descripción" class="form-control" autofocus>
          </div>
       
          
      
         <button type="submit" class="btn btn-primary">
            Save
          </button></center>
        </form>
        <h2>Buscar Articulo</h2>
        <form action="articulo_get.php" method="POST" >
        <center>
          <div class="form-group">
          <label for="co_art">Nombre</label>
            <input type="text" style="width: 95%;" name="co_art" placeholder="Descripción" class="form-control" autofocus>
          </div>
          <div class="form-group">
          <label for="linea_des">Linea</label>
           <select name="linea_des" id="" style="width: 95%; background-color:white;"  placeholder="Código" class="form-control">
                  <option value="todos">Todas</option>
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
         <button type="submit" class="btn btn-primary">
            Search
          </button></center>
        </form>
        
      </div>
     </div>
    

    </div>

    <hr>
  
   
      <table class="table table-bordered table-hover" id="tblData">
        <thead >
          <tr class="table-secondary">
            
            
            <td id="w">Código</td>
            <td >Linea</td>
            <td>Precio</td>
            <td id="w">Referencia</td>
            <td>Cantidad</td>
            <td>Accion</td>
          </tr>
        </thead>
        <tbody>

        
        <?php
         
         

          //CONSULTA DE ARTICULOS
          $consulta="SELECT * FROM art";
          $runC=pg_query($conn,$consulta);

          //CONSULTA DE LA TASA DEL DIA
        
          $tasa="SELECT tasa_dia FROM configuracion where ref=0";
          $runT=pg_query($conn,$tasa);
          $rowT=pg_fetch_assoc($runT);
          $dolar=$rowT['tasa_dia'];   

          while($rowC=pg_fetch_assoc($runC)) { 
            $campo1=$rowC['id'];
            $campo2=$rowC['co_art'];
                $m_campo2 = ucwords($campo2); 
            $campo3=$rowC['linea_des'];
            $campo4=$rowC['ref_art'];
                $total=$campo4*$dolar;
                $bolivares=number_format($total, 2, ',', '.');
            $campo5=$rowC['stock'];    
            ?>
          <tr>
           
            <td id="w"><?php echo $m_campo2; ?></td>
            <td ><?php echo $campo3; ?></td>
            <td>BSD.<?php echo $bolivares; ?></td>
            <td id="w"><?php echo $campo4; ?></td>
            <td><?php echo $campo5; ?></td>
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


        <?php

    
/*           while($rowC=pg_fetch_assoc($runC)) { 
            $campo1=$rowC['id'];
            $campo2=$rowC['art_des'];
            $campo3=$rowC['co_art'];
            $campo4=$rowC['ref_art'];
                $total=$campo4*$dolar;
                $bolivares=number_format($total, 2, ',', '.');
            $campo5=$rowC['stock'];
            
              echo "
            <tr>
              <td>".$campo1."</td>
              <td>".$campo2."</td>
                  <td>".$campo3."</td>
                  <td>Bs.".$bolivares."</td>
                  <td>".$campo4."</td>
                  <td>".$campo5."</td>
                  <td>
                  <a href='edit.php?id= $campo1['id']' class='btn btn-secondary'>
                    <i class='fas fa-marker'></i>
                  </a>
                  <a href='delete_task.php?id= $campo1['id']' class='btn btn-danger'>
                    <i class='far fa-trash-alt'></i>
                  </a>
                </td>
              
            </tr>";
            
            
          } */

?>
        

        </tbody>
      </table>




      
    



  </div>
</div>
    




<?php
require_once '../includes/excel.php';  


?>
</body>
</html>










