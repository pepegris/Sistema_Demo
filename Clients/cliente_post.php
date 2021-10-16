
<?php


require '../includes/log.php';





include '../includes/loading.php';



if (isset($_POST)) {
    require '../includes/conexion.php';

  // var_dump($_POST);

    
    
    $nombre_1=isset($_POST ['nombre']) ? pg_escape_string($conn,$_POST['nombre']):false ;
    $ci=isset ($_POST ['ci']) ? pg_escape_string($conn,$_POST ['ci'] ): false ;
    $numero=isset($_POST ['numero']) ? pg_escape_string($conn,trim($_POST ['numero'])) : false;
    $email=isset($_POST ['email']) ? pg_escape_string($conn,trim($_POST ['email'])) :false;
    $informe=isset ($_POST ['informe']) ? pg_escape_string($conn,$_POST ['informe'] ): false ;
    $direccion=isset ($_POST ['direccion']) ? pg_escape_string($conn,$_POST ['direccion'] ): false ;

    //PONE EN MINUSCULA
    $nombre=mb_strtolower($nombre_1);
   

    if ($conn) {

        if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)) {

            
        $sql= "INSERT INTO clientes (nombre,ci,numero,email,direccion,informe,deuda,auditoria,fecha) VALUES ('$nombre','$ci','$numero','$email','$direccion','$informe',null,'$cuenta_on',now())";
 
        $guardar = pg_query($conn,$sql);

        if (!$guardar) {
           
            $error=pg_last_error($conn);
           echo "<br><center><h3>ERROR</h3></center>";
           echo "<h4>$error</h4>";  
           echo "<a href='inicio.php' class='btn btn-danger'>Salir</a>";
           die();
           
            
        }else {
            header('refresh:2;url= clientes.php');
            exit;
        }


                    } else {
                        echo "<br><center><h3>ERROR</h3></center>";
                    echo "<h4>Correo invalido $email</h4>";
                    echo "<a href='clientes.php' class='btn btn-danger'>Salir</a>";
                    die();
                    }

            
 
    }
  

   
} else{
    header('refresh:2;url= clientes.php');
    exit;
}

















?>












