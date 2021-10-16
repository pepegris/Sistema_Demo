<?php


 include '../includes/loading.php'; 

if (isset($_POST)) {
   /*  require '../includes/log.php';  */
    require '../includes/conexion.php';

  //  var_dump($_POST);
  $usuario_1=isset($_POST ['nombre']) ? pg_escape_string($conn,trim($_POST ['nombre'])) :false;
  $email=isset($_POST ['email']) ? pg_escape_string($conn,trim($_POST ['email'])) :false;
  $telefono=isset($_POST ['telefono']) ? pg_escape_string($conn,$_POST ['telefono']) : false;
  $password=isset($_POST ['pass']) ? pg_escape_string($conn,trim($_POST ['pass'])) :false;
  
  //PONE EN MINUSCULA
  $usuario = mb_strtolower($usuario_1);

        //validar formulario

      

        if ($conn) {

          // VALIDAR SI ES UN EMAIL VALIDO
          if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)) {

              
            


            //CIFRAR LA CONTRASEÑA !!!!!!!!!!!!!
 
          $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
       
         // var_dump(password_verify($password,$password_segura));
            

         //insertar usuario en la base de datos
        $sql= "INSERT INTO  usuario (usuario,correo,clave,telefono,auditoria,fecha) VALUES ('$usuario','$email','$password_segura','$telefono','$cuenta_on',now())";
 
        $guardar = pg_query($conn,$sql);

        //mostrar error
        if (!$guardar) {
             
         
          $error=pg_last_error($conn);
          echo "<br><center><h3>ERROR</h3></center>";
          echo "<h4>$error</h4>";
          echo "<a href='registrar.php' class='btn btn-danger'>Salir</a>";
          
          die();
          
           
           
       }else {
           header('refresh:2;url= registrar.php');
           exit;
       }
              


            } else {
              echo "<br><center><h3>ERROR</h3></center>";
          echo "<h4>Correo invalido $email</h4>";
           echo "<a href='registrar.php' class='btn btn-danger'>Salir</a>";
          die();
          }
         
  
              
   
      }else {
        header("location: registrar.php");
        exit;
    }

            
            
            
            
     






}else {
  header("location: registrar.php");
}
?>