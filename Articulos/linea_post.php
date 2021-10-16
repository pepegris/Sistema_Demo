
<?php

require '../includes/log.php';



if (isset($_POST)) {
    require '../includes/conexion.php';



    
    $linea_des=isset($_POST ['linea_des']) ? pg_escape_string($conn,$_POST['linea_des']):false ;
    

    if ($conn) {
        $sql= "INSERT INTO linea (linea_des,fecha) VALUES ('$linea_des',now())";
 
        $guardar = pg_query($conn,$sql);

        if (!$guardar) {
           
            $error=pg_last_error($conn);
           echo "<center><h3>ERROR</h3>";
           echo "<h4>$error</h4>";

            
           echo "<a href='inicio.php' class='btn btn-danger'>Salir</a></center>";
           die();
           
            
        }else {
           
            header('location: articulos.php');
            exit;
        }

            
 
    }else {
           
        header('location: articulos.php');
        exit;
    }

  

   
} else{
    header('location: articulos.php');
    exit;
}

















?>













