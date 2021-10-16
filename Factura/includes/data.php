<?php 

require_once 'database.php';

$search=$_POST['search'];;

if (!empty($search)) {

    $sql="SELECT * FROM art WHERE co_art LIKE '$search%'";
    $res= pg_query($conn,$sql);


//calculando la tasa
    $tasa="SELECT tasa_dia FROM configuracion where ref=0";
    $runT=pg_query($conn,$tasa);
    $rowT=pg_fetch_assoc($runT);
    $dolar=$rowT['tasa_dia'];   
//calculando la tasa


    if (!$res) {
        
        die('error consulta'.pg_last_error($conn));
    }
    /* DECLARANDO UN JSON */

    $json=array();
    while ($row= pg_fetch_array($res)) {

//calculando BOLIVARES
        $ref_art=$row['ref_art'];
        $total=$ref_art*$dolar;
        $bolivares=number_format($total, 2, ',', '.');
//calculando BOLIVARES

        $json[]=array(

            'articulo'=> $row['co_art'],
            'precio' => $bolivares,
            'id'=> $row['id'],
            'stock'=> $row['stock']


        );

    }

    $json_string=json_encode($json);
    echo $json_string;
    
   
}



?>