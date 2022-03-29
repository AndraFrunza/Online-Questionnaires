<?php

    if(isset($_POST["submit"])){  //daca a fost apasat butonul inregistrare
        
        $nume=$_POST["nume"];
        $prenume=$_POST["prenume"];
        $email=$_POST["email"];
        $parola=$_POST["parola"];
        $parolaConfirm=$_POST["parolaConfirm"];

        $nume=htmlentities($nume);
        $prenume=htmlentities($prenume);
        $email=htmlentities($email);
        $parola=htmlentities($parola);
        $parolaConfirm=htmlentities($parolaConfirm);

        include 'conectare.inc.php';
        include 'functii.inc.php';

        if(invalidEmail($email) !== false){
            header("location: ../inregistrare.php?error=invalidEmail");
            exit();
        }
        if(pwdMatch($parola, $parolaConfirm) !== false){
            header("location: ../inregistrare.php?error=pwddontMatch");
            exit();
        }
        if(userExists($conn, $email) !== false){
            header("location: ../inregistrare.php?error=userTaken");
            exit();
        }

        createUser($conn, $nume, $prenume, $email, $parola);

    }
    else{
        header("location: ../inregistrare.php");
        exit();
    }

?>