<!DOCTYPE html>
<html lang="ro">
    <head>
        <title>Chestionare online</title>
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
                    include 'includes/conectare.inc.php';
                    if(isset($_POST["sterge_c"]))
                        $sql="SELECT * FROM chestionar_c";
                    if(isset($_POST["sterge_csharp"]))
                        $sql="SELECT * FROM chestionar_csharp";
                    if(isset($_POST["sterge_html"]))
                        $sql="SELECT * FROM chestionar_html";
                    if(isset($_POST["sterge_java"]))
                        $sql="SELECT * FROM chestionar_java";
                    $rezultat=mysqli_query($conn,$sql);  //trimite la server comanda sql
                    $i=1;

                    echo "<div style='margin: auto;width: 50%;'>";
                    echo "<form style='text-align: left;' method='POST' >";

                    while($rand=mysqli_fetch_array($rezultat))
                    {
                        
                        echo "<label>".$i.". ".htmlentities($rand['intrebare'])."</label><br>";

                        echo '<input type="radio" value="a" name="'.$i.'">';
                        echo '<label for="a">'.htmlentities($rand['varianta_a']).'</label><br>';

                        echo '<input type="radio" value="b" name="'.$i.'">';
                        echo '<label for="b">'.htmlentities($rand['varianta_b']).'</label><br>';

                        echo '<input type="radio" value="c" name="'.$i.'">';
                        echo '<label for="c">'.htmlentities($rand['varianta_c']).'</label><br>';

                        echo '<input type="radio" value="d" name="'.$i.'">';
                        echo '<label for="d">'.htmlentities($rand['varianta_d']).'</label><br>';

                        if(isset($_POST["sterge_c"]))
                            echo '<input id="buton" formaction="includes/sterge.inc.php?id='.$rand['id'].'" type="submit" name="sterge_c" value="Sterge">';
                        if(isset($_POST["sterge_csharp"]))
                            echo '<input id="buton" formaction="includes/sterge.inc.php?id='.$rand['id'].'" type="submit" name="sterge_csharp" value="Sterge">';
                        if(isset($_POST["sterge_html"]))
                            echo '<input id="buton" formaction="includes/sterge.inc.php?id='.$rand['id'].'" type="submit" name="sterge_html" value="Sterge">';
                        if(isset($_POST["sterge_java"]))
                            echo '<input id="buton" formaction="includes/sterge.inc.php?id='.$rand['id'].'" type="submit" name="sterge_java" value="Sterge">';
                        echo "<br><br>";
                        $i++;
                    }
                    
                    echo "</form>";
                    echo "</div>";
               ?>

            </div>
            <div id="footer"><p>&copy; AF&CA 2021</p></div>
        </div>
    </body>
</html>
