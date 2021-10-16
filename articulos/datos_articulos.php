<?php


include '../includes/loading.php';
    // recibimos los datos de la imagen

if (isset($_FILES) && isset($_POST)) {

        require_once '../includes/conexion.php'; 
        
        //ruta de la imagen
        $nombre_imagen = $_FILES['imagen']['name'];
        $tipo_imagen   = $_FILES['imagen']['type'];
        $tam_imagen    = $_FILES['imagen']['size'];
        
        //informacion para la base de dato
        $art_nombre=isset ($_POST ['art_nombre']) ? mysqli_real_escape_string($conn,$_POST ['art_nombre'] ): false ;
        $co_art=isset($_POST ['co_art']) ? mysqli_real_escape_string($conn,$_POST['co_art']):false ;
        $ref_art=isset($_POST ['ref_art']) ? mysqli_real_escape_string($conn,$_POST['ref_art']):false ;
        $stock=isset($_POST ['stock']) ? mysqli_real_escape_string($conn,$_POST['stock']):false ;
        $art_des=isset($_POST ['art_des']) ? mysqli_real_escape_string($conn,$_POST['art_des']):false ;

        

    /*     var_dump($_FILES); */
       var_dump($_POST); 
        
    if ($tam_imagen <= 10000000) {

        if ($tipo_imagen=="image/jpeg" or $tipo_imagen=="image/jpg" or $tipo_imagen=="image/png" or $tipo_imagen=="image/gif"  ) {

        
            //ruta del destino del servidor
            $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/pagina_fiscales/php/uploads/';

            //almacenando nombre y direccion de la imagen

            $art_img='_'.$art_nombre.'_'.$nombre_imagen;

            echo $art_img;
        
            //mover imagen a directorio temporal
        
            move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$art_img);

            

                //insertando datos en la base de dato

                if ($conn) {

                    $sql= "INSERT INTO art VALUES (null,'$art_nombre','$art_des','$art_img','$co_art','$ref_art',null,null,'$stock',now())";
            
                    $guardar = mysqli_query($conn,$sql);
            
                                if (!$guardar) {


                                //mandando mensaje de error de la base de datos
                                
                                $error= mysqli_error($conn);
                                echo "<br><center><h3>ERROR</h3></center>";
                                echo "<h4>$error</h4>";
                        
                                    
                                echo "<a href='articulos.php' class='btn btn-danger'>Salir</a>";
                                die();
                                
                                    
                                }else {
                                    header('refresh:2;url= articulos.php');
                                    exit;
                                }
            
                        
            
                } else {
                    
                                    
                                echo "<a href='articulos.php' class='btn btn-danger'>Salir</a>";
                                die("La conexión ha fallado: " . mysqli_connect_error());
                }


    
            
            }else {
                echo "<center><h3>Por favor suba una imagen valida /JPG/JPEG/PNG/GIF: </h3> <p>$tipo_imagen</p></center>";
                echo "<a href='articulos.php' class='btn btn-danger'>Salir</a>";
                                die();
            }
    
    
    }else {
        echo "<center><h3>Ingrese una imagen de un tamnaño inferior a 10MB: </h3> <p>$tam_imagen</p></center>";
        echo "<a href='articulos.php' class='btn btn-danger'>Salir</a>";
                        die();
    }


}else{
        header('refresh:2;url= articulos.php');
        exit;
    }

  
?>
