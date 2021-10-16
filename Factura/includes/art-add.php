<?php

require_once 'database.php';


if (isset($_POST['name'])) {

    $name= $_POST['name'];
    $description = $_POST['description'];

    $sql= "INSERT INTO reng_fact (task,description) values ('$name','$description')";
    $run = pg_query($conn,$sql);

    if (!$run) {
        die('falllllooooo');
    }else{
        echo 'funciono';
    }
}







?>