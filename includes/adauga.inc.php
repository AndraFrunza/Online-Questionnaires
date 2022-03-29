<?php

    if(isset($_POST['adauga_c']) || isset($_POST['adauga_csharp']) || isset($_POST['adauga_html']) || isset($_POST['adauga_java'])){  

        $intrebare=$_POST["intrebare"];
        $raspuns_a=$_POST["rasp_a"];
        $raspuns_b=$_POST["rasp_b"];
        $raspuns_c=$_POST["rasp_c"];
        $raspuns_d=$_POST["rasp_d"];
        $raspuns_corect=$_POST["raspuns_corect"];

        $intrebare=htmlentities($intrebare);
        $raspuns_a=htmlentities($raspuns_a);
        $raspuns_b=htmlentities($raspuns_b);
        $raspuns_c=htmlentities($raspuns_c);
        $raspuns_d=htmlentities($raspuns_d);

        include 'conectare.inc.php';
        
        if(isset($_POST['adauga_c']))
            $sql = "INSERT INTO chestionar_c(intrebare,varianta_a,varianta_b,varianta_c,varianta_d,varianta_corecta)
                VALUES (?, ?, ?, ?, ?, ?);";
        if(isset($_POST['adauga_csharp']))
            $sql = "INSERT INTO chestionar_csharp(intrebare,varianta_a,varianta_b,varianta_c,varianta_d,varianta_corecta)
                VALUES (?, ?, ?, ?, ?, ?);";
        if(isset($_POST['adauga_html']))
            $sql = "INSERT INTO chestionar_html(intrebare,varianta_a,varianta_b,varianta_c,varianta_d,varianta_corecta)
                VALUES (?, ?, ?, ?, ?, ?);";
        if(isset($_POST['adauga_java']))
            $sql = "INSERT INTO chestionar_java(intrebare,varianta_a,varianta_b,varianta_c,varianta_d,varianta_corecta)
                VALUES (?, ?, ?, ?, ?, ?);";
        
        $stmt = mysqli_stmt_init($conn); //intoarce un obiect care va fi folosit ca
                                        //param la functia mysqli_stmt_prepare()
        if(!mysqli_stmt_prepare($stmt, $sql)){   //pregateste o intructiune pentru executie
            header("location: ../adauga.php?error");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, 'ssssss', $intrebare, $raspuns_a, $raspuns_b, $raspuns_c, $raspuns_d, $raspuns_corect); //s=string
            //utilizata pt a lega variabilele de marcatorii paramteriilor unei instructiuni pregatite
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("location: ../categorii.php");
        exit();
    }
    else{
        header("location: ../adauga.php");
        exit();
    }

?>