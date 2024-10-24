<?php
    $server ='localhost';
    $user ='root';
    $pass ='';
    $database ='pbl4';

    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn) {
        mysqli_query($conn, "SET NAMES 'utf8' ");
        
    }
    else {
        echo 'Connected unsuccesfully!';
    }
?>