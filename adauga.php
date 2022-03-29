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
            <h2>Adauga o intrebare</h2><br>
            <form action="includes/adauga.inc.php" method="POST">
                <label>Intrebare: </label><br>
                <textarea type="text" size="100" name="intrebare" required></textarea><br>
                <label>Raspuns a: </label><br>
                <input type="text" size="50" name="rasp_a" required><br>
                <label>Raspuns b: </label><br>
                <input type="text" size="50" name="rasp_b" required><br>
                <label>Raspuns c: </label><br>
                <input type="text" size="50" name="rasp_c" required><br>
                <label>Raspuns d: </label><br>
                <input type="text" size="50" name="rasp_d" required><br>
                <label>Raspuns corect:</label>
                <select id="raspuns_corect" name="raspuns_corect">
                    <option value="a">a</option>
                    <option value="b">b</option>
                    <option value="c">c</option>
                    <option value="d">d</option>
                </select><br><br>
                <?php
                    if(isset($_POST["adauga_c"]))
                        echo '<input id="buton" type="submit" name="adauga_c" value="Adauga">';
                    if(isset($_POST["adauga_csharp"]))
                        echo '<input id="buton" type="submit" name="adauga_csharp" value="Adauga">';
                    if(isset($_POST["adauga_html"]))
                        echo '<input id="buton" type="submit" name="adauga_html" value="Adauga">';
                    if(isset($_POST["adauga_java"]))
                        echo '<input id="buton" type="submit" name="adauga_java" value="Adauga">';
                ?>
            </form>
            
        </div>
        </div>
        <div id="footer"><p>&copy; AF&CA 2021</p></div>
</div>
    </body>
</html>