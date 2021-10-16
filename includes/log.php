<?php

 



 session_start();

$cuenta_on=$_SESSION['username'];

if (!isset($cuenta_on)) {
    header("location:../index.php");
}

$cuenta_on = ucwords($cuenta_on); 


 
?>
<style>

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
   font-size:5px;

            }

    }
</style>


<a id="usuario" href="#" class="btn btn-dark"  >Usuario: <?=$cuenta_on?></a>
