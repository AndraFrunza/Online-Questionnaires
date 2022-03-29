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
                <br><p style="text-align:center; font-size:30px;">Alege un limbaj de programare:</p><br><br>
                <ul>
                    <li style="width:25%">
                        <img style="width: 200px;" src="img/c_plusplus.jpeg" alt="chestionar_c++"><br>
                        <form method="POST" action="chestionar.php"><input id="buton" type="submit" name="chestionar_c" value="Incepe testul"></form>
                        <?php
                            if(isset($_SESSION["admin"])){
                                echo "<form method='POST' action='adauga.php'><input id='buton' type='submit' name='adauga_c' value='Adauga intrebari'></form>";
                                echo "<form method='POST' action='sterge.php'><input id='buton' type='submit' name='sterge_c' value='Sterge intrebari'></form>";
                            }
                        ?>
                    </li>

                    <li style="width:25%">
                        <img style="width: 200px;" src="img/c_sharp.png" alt="chestionar_csharp"><br>
                        <form method="POST" action="chestionar.php"><input id="buton" type="submit" name="chestionar_csharp" value="Incepe testul"></form>
                        <?php
                            if(isset($_SESSION["admin"])){
                                echo "<form method='POST' action='adauga.php'><input id='buton' type='submit' name='adauga_csharp' value='Adauga intrebari'></form>";
                                echo "<form method='POST' action='sterge.php'><input id='buton' type='submit' name='sterge_csharp' value='Sterge intrebari'></form>";
                            }
                        ?>
                    </li>

                    <li style="width:25%">
                        <img style="width: 200px;" src="img/html.jpeg" alt="chestionar_html"><br>
                        <form method="POST" action="chestionar.php"><input id="buton" type="submit" name="chestionar_html" value="Incepe testul"></form>
                        <?php
                            if(isset($_SESSION["admin"])){
                                echo "<form method='POST' action='adauga.php'><input id='buton' type='submit' name='adauga_html' value='Adauga intrebari'></form>";
                                echo "<form method='POST' action='sterge.php'><input id='buton' type='submit' name='sterge_html' value='Sterge intrebari'></form>";
                            }
                        ?>
                    </li>

                    <li style="width:25%">
                        <img style="width: 200px;" src="img/java.jpeg" alt="chestionar_java"><br>
                        <form method="POST" action="chestionar.php"><input id="buton" type="submit" name="chestionar_java" value="Incepe testul"></form>
                        <?php
                            if(isset($_SESSION["admin"])){
                                echo "<form method='POST' action='adauga.php'><input id='buton' type='submit' name='adauga_java' value='Adauga intrebari'></form>";
                                echo "<form method='POST' action='sterge.php'><input id='buton' type='submit' name='sterge_javac' value='Sterge intrebari'></form>";
                            }
                        ?>
                    </li>
                <ul>


            </div>
            <div id="footer"><p>&copy; AF&CA 2021</p></div>
        </div>
    </body>
</html>