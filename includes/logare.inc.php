<?php

    if(isset($_POST["submit"])){ //daca a fost apasat butonul logare
        
        $email = $_POST["email"];
        $parola = $_POST["parola"];
        $opt_logare = $_POST["optiune_logare"];

        $email = htmlentities($email);
        $parola = htmlentities($parola);

        include 'conectare.inc.php';
        include 'functii.inc.php';

        if($opt_logare === "user")
            logareUser($conn, $email, $parola);
        if($opt_logare === "admin")
            logareAdmin($conn, $email, $parola);
    }
    else{
        header("location: ../logare.php");
        exit();
    }
?>