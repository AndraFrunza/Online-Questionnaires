<?php
    //conectare
    $host="localhost";
    $user="root";
    $passw="";
    $db_name="proiect";

    $conn=mysqli_connect($host,$user,$passw,$db_name);
    if(!$conn)
        echo mysqli_connect_error();
    mysqli_set_charset($conn,"utf8");
    
?>
