<?php

    if(isset($_POST['sterge_c']) || isset($_POST['sterge_csharp']) || isset($_POST['sterge_html']) || isset($_POST['sterge_java'])){  

        include 'conectare.inc.php';
        $nr_intrebare=$_GET["id"];

        if(isset($_POST['sterge_c'])){
            $sql = "DELETE FROM chestionar_c WHERE id=?;";
        }
        if(isset($_POST['sterge_csharp'])){
            $sql = "DELETE FROM chestionar_csharp WHERE id=?;";
        }
        if(isset($_POST['sterge_html'])){
            $sql = "DELETE FROM chestionar_html WHERE id=?;";
        }
        if(isset($_POST['sterge_java'])){
            $sql = "DELETE FROM chestionar_java WHERE id=?;";
        }
        
        $stmt = mysqli_stmt_init($conn); //intoarce un obiect care va fi folosit ca
                                        //param la functia mysqli_stmt_prepare()
        if(!mysqli_stmt_prepare($stmt, $sql)){   //pregateste o intructiune pentru executie
            header("location: ../sterge.php?error");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, 's', $nr_intrebare); //s=string
            //utilizata pt a lega variabilele de marcatorii paramteriilor unei instructiuni pregatite
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("location: sterge.inc.php");
        exit();
    }
    else{
        header("location: ../categorii.php");
        exit();
    }

?>