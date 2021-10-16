<?php
 require '../includes/log.php';
include '../includes/loading.php';

if (isset($_POST)) {
    require '../includes/conexion.php';



    
    $tasa=isset($_POST ['tasa_dia']) ? pg_escape_string($conn,trim($_POST ['tasa_dia'])) :false;
    $iva=isset($_POST ['iva']) ? pg_escape_string($conn,trim($_POST ['iva'])) :false;


    if ($conn) {







       if ($tasa ==true) {

                        $sql= "UPDATE configuracion SET tasa_dia=$tasa WHERE ref =0 ";
                
                        $guardar = pg_query($conn,$sql);

                        if (!$guardar) {
                            
                            $error= pg_error($conn);
                            
                            echo "<br><center><h3>ERROR</h3></center>";
                            echo "<h4>$error</h4>";   
                            echo "<a href='inicio.php' class='btn btn-danger'>Salir</a>";
                            die();
                            
                        }else {
                            header('refresh:2;url= inicio.php');
                            exit;
                        }


       } elseif ($iva==true) {

                        $sql= "UPDATE configuracion SET iva=$iva WHERE ref =0 ";
                
                        $guardar = pg_query($conn,$sql);

                        if (!$guardar) {
                        
                            $error=pg_last_error($conn);
                            echo "<br><center><h3>ERROR</h3></center>";
                            echo "<h4>$error</h4>";
                            echo "<a href='inicio.php' class='btn btn-danger'>Salir</a>";
                            die();
                            
                        }else {
                            header('refresh:2;url= inicio.php');
                            exit;
                        }

       }













            
 
    }else {
        
        header('refresh:1;url= inicio.php');
        exit;
    }
  









}else {
            header('refresh:1;url= inicio.php');
            exit;
        }















?>