<?php  require '../includes/log.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Inicio</title>
</head>
<style>

.empresa #inf-empresa {
    border-radius: 10px;  
  background-color:  rgba(29, 27, 27, 0.205);
  box-shadow: 2px 2px 5px #999;
}

.empresa{
    height: 100vh;
  
    
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: -5;
    

}

.empresa #inf-empresa{
    width: 500px;
 
    z-index: -1;
    
}
.empresa #inf-empresa b{
    color: black;
}
.empresa #inf-empresa p{
    color: black;
}
@media (max-width: 900px){
 
    .empresa #inf-empresa{
    width: 300px;
    margin-top: 35px;
}
#usuario{
    display: none;
}

    }


</style>
<body>
 

<?php

require_once '../includes/menu.php';


?>


    <div class="empresa">
       
        <?php
                require '../includes/empresa.php';

                
            ?>
<center>
        <div class="card text-black mb-3" id="inf-empresa" >
            <div class="card-header" style="color:white;" >Datos de la empresa</div>
            <div class="card-body">
            
            <h3 class="card-title"><?php echo "$empresa" ?></h3>
            
            <p class="card-text"><b>RIF: </b><?php echo "$rif" ?></p>
            <p><b>Razon Social: </b><?php echo "$razon_social" ?></p>
            <p><b>Tlf:</b> <?php echo "$numero" ?></p>
            <p><b>Dir:</b> <?php echo "$direcion" ?></p>
            <p><b>IVA:</b> <?php echo "$iva" ?>%</p>
            <h4>Tasa del dia</h4>
            <p>BSD <?php echo "$tasa" ?></p>
            
            <form action="cambiar_tasa.php" method="post">
                <input type="number" step="any"  name="tasa_dia" class="form" style="width: 110px;"  value='<?php echo "$tasa_dia" ?>' id="">
                <input type="submit" class="btn btn-secondary" value="Cambiar Tasa">
            </form>
            <br>
            <form action="cambiar_tasa.php" method="post">
                <input type="number" name="iva" class="form" style="width: 110px;" value='<?php echo "$iva" ?>' id="">
                <input type="submit" class="btn btn-secondary" value="Cambiar Iva   ">
            </form>
            <hr>
            <a href="edit_datos.php" class="btn btn-secondary">Cambiar datos de la empresa</a>
        </div>
        </center>  
            
           
            
            
       
        
     

    
    
    </div>
















    </body>
</html>