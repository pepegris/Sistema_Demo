<?php
session_start();

session_unset();

session_destroy();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
     <!-- Estilos personal CSS -->
     <link rel="stylesheet" href="assets/css/materialize/css/materialize.min.css">
     <link rel="stylesheet" href="assets/css/login/animations.css">
     <link rel="stylesheet" href="assets/css/login/a_estilo.css" >
  
 
  </head>
  <style>
  body {
    background-image: url('assets/img/thumb-1920-3827.jpg');
    background-size: cover;
  }
  .derecha{
    background-image: url('assets/img/thumb-1920-373.jpg');
    background-size: cover;
  }

  #usuario{
       position: fixed;
   bottom: 90%;
   right: 5%;
   font-size:30px;
   }

       
@media (max-width: 900px){
 
 #usuario{
   bottom: 90%;
   right: 2%;
   font-size:9px;

            }

    }


  </style>
<body>
    <form class="slideUp" method="POST" action="auntenticando.php">
    <div id="login"class="z-depth-5"  >
            <div id="sistema" >
                <h2>Sistema</h2>
                <div class="row">
                    <div class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          
                          <input type="text" id="autocomplete-input" name="user" class="autocomplete">
                          <label for="autocomplete-input">Usuario</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <div class="row">
                        <div class="input-field col s12">
                          
                          <input type="password" name="pass" id="autocomplete-input" class="autocomplete">
                          <label for="autocomplete-input" >Contraseña</label>
                        </div>
                      </div>
                    </div>
                  </div>
                <button type="submit" class="btn ">Entrar</button>
                <br>
                
            </div>

       
    </form>





<div id="usuario" >
  <p class="btn btn-dark">credenciales <br>
  administrador <br>
  753159*</p>
  
</div>


 
    
    

    <script src="assets/css/materialize/js/materialize.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

  </body>
</html>

