<?php

require('settings.php');

if(isset($_POST)) {
    $data = file_get_contents("php://input");
    $actor = json_decode($data, true);
    echo $actor['firstName']." ". $actor['lastName'];

    mysqli_query($conn, "INSERT INTO actors (afname, alname) 
    VALUES ('" .$actor['firstName']. "', '" .$actor['lastName']. "')"); 
    
}

?>