<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulario_articulos.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>



    <div id="body">
<form action="datos_articulos.php" method="POST" enctype="multipart/form-data"  >
  
    <div class="fieldset">
    <br>
    <center><legend>Registrar Articulo</legend></center>
  
    <div class="form-group">
      <label for="art_nombre" class="form-label mt-2">Nombre</label>
      <input type="text" name="art_nombre"class="form-control" placeholder="Name" required id="">
      
    </div>
    <div class="form-group">
      <label for="co_art" class="form-label mt-2">Codigo de Articulo</label>
      <input required name="co_art" type="text" class="form-control" id="nombre" placeholder="Codigo">
    </div>
    <div class="form-group">
      <label for="ref_art" class="form-label mt-2">Referencia</label>
      <input required name="ref_art"  type="number" class="form-control" id="nombre" placeholder="Precio $">
    </div>
    <div class="form-group">
      <label for="stock" class="form-label mt-2">Stock</label>
      <input required name="stock" type="number" class="form-control" id="nombre" placeholder="Cantidad">
    </div>
    <div class="form-group">
      <label for="imagen" class="form-label mt-2">Imagen del articulo</label>
      <input type="file" class="form-control" name="imagen" size="100" id="">
    </div>
    <div class="form-group">
      <label for="art_des" class="form-label mt-2">Descripcion</label>
      <input type="text"  class="form-control" name="art_des" id="">
    </div>
    
   
 
    <br>
   
    <center><button type="submit" class="btn btn-success">Save</button></center>
    <br>
    </div>
</form>
</div>

    <button><a href="ver_articulos.php">ir</a></button>
  
    
</body>
</html>