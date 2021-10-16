<?php 

require '../includes/log.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
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
        width: 42%;
    }
    form button {

        margin: 5px 0 5px 0;

    }
    form .form-group{

      margin-top:5px;

    } table td {

      color:black;
      
    }

    
@media (max-width: 900px){
 
 form{
   margin-top: 100px;
 border-radius: 10px;  
 background-color:  rgba(29, 27, 27, 0.205);
 box-shadow: 2px 2px 5px #999;
 width: 80%;
}
.container table #w{
 display: none;
}
}
   
 
   
    
</style>
<?php


require_once '../includes/header.php';
require_once '../includes/menu.php';

?>
<body>
 


<div class="container mt-2">
  <div class="row">
    <!-- CARGAR ARTICULO -->
    
    
  

     
     
     <center>
      <div class="card-body">

        <form action="cliente_get.php" method="POST" >
        
        <center>
        <h2>Buscar Vendedor</h2>
          <div class="form-group">
            <input type="text" style="width: 95%;" name="nombre" placeholder="Name" class="form-control" autofocus>
          </div>
      
         <button type="submit" class="btn btn-primary">
            Search
          </button></center>
        </form>
      </div>
     </center>
    

 

    <hr>
  
   
      <table class="table table-bordered table-hover" id="tblData">
        <thead >
          <tr class="table-secondary">
            
            <td>Name</td>
            <td>CI</td>
            <td>Phone</td>
            <td id="w" >Email</td>
            <td id="w">Direction</td>
            <td id="w">Date</td>
            <td>Action</td>

          </tr>
        </thead>
        <tbody>

        
        <?php
         
          require '../includes/conexion.php';

          //CONSULTA DE vendedores
          $consulta="SELECT * FROM vendedores";
          $runC=pg_query($conn,$consulta);
   

          while($rowC=pg_fetch_assoc($runC)) { 
            $campo1=$rowC['id'];
            $campo2=$rowC['nombre'];
            $campo3=$rowC['ci'];
            $campo4=$rowC['numero'];
            $campo5=$rowC['email'];    
            $campo6=$rowC['direccion'];   
            $campo7=$rowC['fecha']; 
            
              
            ?>
          <tr>
           
           
            <td><?php echo $campo2; ?></td>
            <td><?php echo $campo3; ?></td>
            <td><?php echo $campo4; ?></td>
            <td id="w"><?php echo $campo5; ?></td>
            <td id="w" ><?php echo $campo6; ?></td>
            <td id="w"><?php echo $campo7 ; ?></td>

            <td>
              <a href='edit_vendedores.php?id=<?php echo $campo1?>' class='btn btn-info'>
                <i class='fas fa-marker'></i>
              </a>
              <a href='delete_vendedores.php?id=<?php echo $campo1?>' class='btn btn-danger'>
                <i class='far fa-trash-alt'></i>
              </a>
            </td>
          </tr>
          <?php } ?>

        

        </tbody>
      </table>




      
    



  </div>
</div>
    




<?php
require_once '../includes/excel.php';  


?>


</body>
</html>







