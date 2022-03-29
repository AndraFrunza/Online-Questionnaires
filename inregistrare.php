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

            <div style="margin-top:60px;margin-left: 550px;">
            <h2>Înregistrare</h2><br>
            <form action="includes/inregistrare.inc.php" method="POST">
                <label>Nume: </label><br>
                <input type="text" size="20" name="nume" required><br>
                <label>Prenume: </label><br>
                <input type="text" size="20" name="prenume" required><br>
                <label>E-mail: </label><br>
                <input type="text" size="20" name="email" required><br>
                <label>Parola: </label><br>
                <input type="password" size="20" name="parola" required><br>
                <label>Confirmă parola: </label><br>
                <input type="password" size="20" name="parolaConfirm" required><br><br>
                <input id="buton" type="submit" name="submit" value="Înregistrare">
            </form>
            <br>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "invalidEmail"){
                        echo "<p style='color:red'>Email invalid!</p>";
                    }
                    else if($_GET["error"] == "pwddontMatch"){
                        echo "<p style='color:red'>Parolele nu coincid!</p>";
                    }
                    else if($_GET["error"] == "userTaken"){
                        echo "<p style='color:red'>Acest utilizator exista deja!</p>";
                    }
                    else if($_GET["error"] == "stmtFailed"){
                        echo "<p style='color:red'>Ceva nu a mers bine, incearca din nou!</p>";
                    }
                    else if($_GET["error"] == "none"){
                        header("location:logare.php");
                    }
                }
                
                ?>
        </div>
        </div>
        <div id="footer"><p>&copy; AF&CA 2021</p></div>
</div>
    </body>
</html>