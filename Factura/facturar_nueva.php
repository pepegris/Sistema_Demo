<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Orden de Venta Venezuela</title>
	<link href="../assets/css/factura/bootstrap.css" rel="stylesheet" />
	<style>@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  			body, h1, h2, h3, h4, h5, h6{
    			font-family: 'Bree Serif', serif;
 	 									}
	@media (max-width: 900px){
    #panel input{
        width: 105px;
        height: 30px;
    }
	#factura input{
        width: 150px;
        height: 30px;
    }
	
    
}				  
			
  	</style>


<?php 
require '../includes/conexion.php';
require '../includes/empresa.php';


?>
		<div class="container">
			<div class="row">
            
		<div class="col-xs-6">
			<h1><a href=" "> <!-- COLOCAR PAGINA WEB DE LA EMPRESA  --><img id="imagen" alt=""  src="../assets/img/logo3.png" /></a></h1>
		</div>
		<div class="col-xs-6 text-right">
							<div class="panel panel-default">
							<div class="panel-heading">
									<h4>RIF: 
										<?php echo "$rif"; ?>
									</h4>
									<h4><?php echo "$empresa"; ?>
									</h4>
							</div>
							<div class="panel-body" id="factura">
								<h4>N Orden de Venta Venezuela : 
									<?php 

									if ($numero_factura == null) {
										
										echo "1";
									}else{
										echo $numero_factura;
									}
									
									?>
								</h4>
							</div>
						</div>
					</div>
 
			<hr />
 
			
				<h1 style="text-align: center;">Orden de Venta Venezuela</h1> 
			
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4> <?php echo "Caracas " . date("d") . " del " . date("m") . " de " . date("Y"); ?> 
									
									</h4>
								</div>
						<div class="panel-body" id="panel" >
						
							
								<h4>
									Vendedor:
									<select name="" id="">
									<option value='Seleccionar vendedor'>Seleccionar vendedor</option>
										<?PHP 

										$consulta_vendedores="SELECT * FROM vendedores";

										$vendedores=pg_query($conn,$consulta_vendedores);
										
										while ($datos_vendedores=pg_fetch_assoc($vendedores)) {
											$nombre=$datos_vendedores['nombre'];
											
											
											
										?>
										
										<option value='<?php echo "$nombre"; ?>'><?php echo "$nombre"; ?></option>
										<?php }?>
										</select>




										

								
									
								
								<!-- Comprador :  
									<input  type="text" name="" placeholder="Nombre y Apellido" id="">
									CI/RIF :
									<input  type="text" name="" placeholder="" id=""> -->
								</h4>
							

								
					
						</div>
						</div>
					</div>
					
				</div>
<pre></pre>
<form action="#" method="POST" >
  
    <div class="fieldset" id="venta">
    <br>
	<div class="form-group" >								
	<label for="nombre" class="form-label mt-2">Cliente</label>
									<select name="" id="" class="form-control">
									<option value='Seleccionar Cliente'>Seleccionar Cliente</option>
										<?PHP 

										$consulta_clientes="SELECT * FROM clientes";

										$clientes=pg_query($conn,$consulta_clientes);
										
										while ($datos_clientes=pg_fetch_assoc($clientes)) {
											$nombre=$datos_clientes['nombre'];
											
											
											
										?>
										
										<option value='<?php echo "$nombre"; ?>'><?php echo "$nombre"; ?></option>
										<?php }?>
										</select>
    
										</div>

    <div class="form-group" >
      <label for="numero" class="form-label mt-2">Numero Cliente</label>
      <input required name="numero"  type="text" class="form-control" id="nombre" placeholder="Phone">
    </div>
	<div class="form-group">
      <label for="numero" class="form-label mt-2">Numero de Contacto del Cliente</label>
      <input required name="numero"  type="text" class="form-control" id="nombre" placeholder="Phone">
    </div>
    <div class="form-group">
      <label for="email" class="form-label mt-2">Correo Cliente</label>
      <input required name="email" type="email" class="form-control" id="nombre" placeholder="vendedor@email.com">
    </div>

	<div class="form-group">
      <label for="email" class="form-label mt-2">Frasco Vendido</label>
      <input required name="numero" v-model="cantidad"  type="number" class="form-control" id="nombre" placeholder="Frasco">
    </div>
    <div class="form-group">
      <label for="direccion" class="form-label mt-2">Monto Total a cobrar</label>
      <input required name="numero" v-model="mensaje"  type="number" class="form-control" id="nombre" placeholder="Total">
    </div>

	<div class="form-group">
      <label for="direccion" class="form-label mt-2" >Estado</label>
      <select name="" id=" " class="form-control">
		  <option value="">Distrito Capital</option>
		  <option value="">Aragua</option>
		  <option value="">Carabobo</option>
		  <option value="">Miranda</option>
		  <option value="">Tachira</option>
	  </select>
    </div>
	<div class="form-group">
	<label for="direccion" class="form-label mt-2">Dirección de Entrega (lo más exacta posible, incluya la ciudad)</label>
		<input type="text" name="" id="" class="form-control">
	</div>

	<div class="form-group">
      <label for="direccion" class="form-label mt-2">Tipo de Entrega</label>
      <select name="" id="" class="form-control">
		  <option value="">Envio vzla 1</option>
		  <option value="">Envio vzla 2</option>
		  <option value="">Envio vzla 3</option>
		  <option value="">Envio vzla 4 (Agencia de Envio)</option>
	  </select>
    </div>
	<div class="form-group">
      <label for="direccion" class="form-label mt-2">Fecha de Entrega y Hora de Entrega (Estimada)</label>
      <input type="datetime-local" name="" id="" class="form-control">
    </div>
	<div class="form-group">
      <label for="direccion" class="form-label mt-2">Método de Pago</label>
      <select name="" id="" class="form-control">
		  <option value="">Efectivvo o Cash (solo entregas personales)</option>
		  <option value="">Transferenica Bancria (Banoc a Bano en BSD)</option>
		  <option value="">PayPal</option>
	  </select>
    </div>
	<div class="form-group">
      <label for="direccion" class="form-label mt-2">Especificar Otro Medio de Contacto</label>
      <input type="text" name="" id="" class="form-control">
    </div>
	
	

<pre></pre>
		

	<div class="row">
			<div class="col-xs-4">
				<h1><a href=" "><img alt="" src="../assets/img/qr.png" /></a></h1>
			</div>
		
	</div>
		
</div>
</div>

</head>
<script src="../assets/js/vue.js"></script>
<script src="../assets/js/vue@2.6.12"></script>
<script src="../assets/js/vue_venta.js"></script>

<body>
	<center><input type="button" name="imprimir" value="Imprimir" onclick="window.print();"> </center>
	<br>
	
</body>
</html>