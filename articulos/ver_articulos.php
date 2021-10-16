<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include '../includes/header.php'; 
    ?>
    

    
    <title>Document</title>
</head>
<body>




    <table class="table table-bordered table-hover" id="tblData">
        <thead >
          <tr class="table-secondary">
            
            <td>Articulo</td>
            <td>Imagen</td>
            <td>Precio</td>
            <td>Código</td>
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Accion</td>
          </tr>
        </thead>
        <tbody>

        
        <?php

    require '../includes/conexion.php';


    $sql="SELECT * FROM art WHERE id>=1";

    $resultado=mysqli_query($conn,$sql);

    while ($tabla=mysqli_fetch_array($resultado)) {

    $id = $tabla['id'];
    $nombre = $tabla['art_nombre'];
    $imagen = $tabla['art_img'];
    $codigo = $tabla['co_art'];
    $cantidad = $tabla['stock'];
    $des = $tabla['art_des'];
    $referencia = $tabla['ref_art'];
    
    ?>
          <tr>
           
            <td><?php echo $nombre; ?></td>
            <td><img src="../uploads/<?=$imagen?>" alt="" width="80px" ></td>
            <td>$.<?php echo $referencia ; ?></td>
            <td><?php echo $codigo; ?></td>
            <td><?php echo $des; ?></td>
            <td><?=$cantidad  ?></td>
            <td>
              <a href='edit.php?id=<?php echo $id?>' class='btn btn-info'>
                <i class='fas fa-marker'></i>
              </a>
              <a href='delete.php?id=<?php echo $id?>' class='btn btn-danger'>
                <i class='far fa-trash-alt'></i>
              </a>
            </td>
          </tr>
          <?php } ?>


        <?php

    require '../includes/excel.php';


?>
        

        </tbody>
      </table>


    
</body>
</html>