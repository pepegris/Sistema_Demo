<?php
 require '../includes/log.php';
include '../includes/header.php';
require '../includes/conexion.php';

          $consulta="SELECT * FROM configuracion";
          $empresa=pg_query($conn,$consulta);

              $datos=pg_fetch_assoc($empresa);
              $empresa=$datos['empresa'];
              $rif=$datos['rif'];
              $razon_social=$datos['razon_social'];
              $numero=$datos['numero'];
              $direcion=$datos['direcion'];
              $tasa_dia=$datos['tasa_dia'];
              
              
              
              ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="cambiar_datos.php" method="POST">
        <div class="form-group">
          <input type="text" name="empresa"  class="form-control" value="<?php echo $empresa; ?>" placeholder="Nombre de la empresa" require>
        </div>
        <div class="form-group">
        <input type="text" name="rif"   class="form-control" value="<?php echo $rif;?>" placeholder="Rif" require>
        </div>
        <div class="form-group">
        <input type="text" name="razon_social"  class="form-control" value="<?php echo $razon_social;?>" placeholder="Razon Social" require>
        </div>
        <div class="form-group">
        <input type="text" name="numero" class="form-control" value="<?php echo $numero;?>" placeholder="Numero de Telefono" require>
        </div>
        <div class="form-group">
        <input type="text" name="direcion" class="form-control" value="<?php echo $direcion;?>" placeholder="Direccion" require>
        </div>
        <button class="btn btn-primary" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>
