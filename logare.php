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
        <div id="header"><h1 id="titlu">Chestionare online</h1></div>
        <div id="menu">
            <?php include "meniu.php" ?>
        </div>
        <div id="content_c">
            <div style="margin-top:60px;margin-left: 550px;">
            <h2>Logare</h2><br>
            <form action="includes/logare.inc.php" method="POST">
                <label>E-mail: </label><br>
                <input type="text" name="email" required><br>
                <label>Parola: </label><br>
                <input type="password" name="parola" required><br><br>
                <label>Logare ca:</label>
                <select id="optiune_logare" name="optiune_logare">
                    <option value="user">Utilizator</option>
                    <option value="admin">Administrator</option>
                </select><br><br>
                <input id="buton" type="submit" name="submit" value="Conectare"><br>
                
            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "wrongUser"){
                        echo "<p style='color:red'>Nu exista acest utilizator!</p>";
                    }
                    else if($_GET["error"] == "wrongPassw"){
                        echo "<p style='color:red'>Parola incorecta!</p>";
                    }

                }
            ?>
            </div>
        </div>
        <div id="footer"><p>&copy; AF&CA 2021</p></div>
    </body>
</html>