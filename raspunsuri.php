<!DOCTYPE html>
<html lang="ro">
    <head>
        <title>chestionare online</title>
        <meta charset="utf-8">
        <link href="css/my_style.css" rel="stylesheet">
        <link href="css/categorii.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/719797a37f.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="wrapper">
            <div id="header"><h1 id="titlu">Chestionare online</h1></div>
            <div id="menu">
                <?php include "meniu.php" ?>
            </div>
            <div id="content_c">
                
            <?php

                if(isset($_POST["submit_c"]) || isset($_POST["submit_csharp"]) || isset($_POST["submit_html"]) || isset($_POST["submit_java"])){
                    
                    $nr_raspunsuri_corecte=0;

                    include 'includes/conectare.inc.php';

                    if(isset($_POST["submit_c"])){ 
                        $sql="SELECT * FROM chestionar_c";
                    }
                    if(isset($_POST["submit_csharp"])){ 
                        $sql="SELECT * FROM chestionar_csharp";
                    }
                    if(isset($_POST["submit_html"])){ 
                        $sql="SELECT * FROM chestionar_html";
                    }
                    if(isset($_POST["submit_java"])){ 
                        $sql="SELECT * FROM chestionar_java";
                    }

                    $rezultat=mysqli_query($conn,$sql);
                    $i=1;
                    while($rand=mysqli_fetch_array($rezultat)){
                        $rasp=$_POST[$i];
                        $corect=$rand['varianta_corecta'];
                        if($rasp === $corect)
                            $nr_raspunsuri_corecte++;
                        $i++;
                    }
                    echo "<p style='font-size:30px; margin-top:200px; text-align:center;'>Ai raspuns corect la ".$nr_raspunsuri_corecte." intrebari!</p>";
    
                }
                else{
                    header("location: index.php");
                    exit();
                }
            ?>

            </div>
            <div id="footer"><p>&copy; AF&CA 2021</p></div>
        </div>
    </body>
</html>
