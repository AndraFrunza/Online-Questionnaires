<?php
    session_start();
?>

<ul>
    <li><a href="index.php">Acasă</a></li>
    <?php
        //verificam daca utilizatorul este logat
        if(isset($_SESSION["email"]) || isset($_SESSION["admin"])){
            echo "<li><a href='categorii.php'>Categorii</a></li>";
        }
        else{
            echo '<li><a href="#" onClick="alert(\'Trebuie sa te loghezi inainte!\')">Categorii</a></li>';
        }
    ?>
    <li><a href="inregistrare.php">Înregistrare</a></li>
    <?php
        //verificam daca utilizatorul este logat
        if(isset($_SESSION["email"]) || isset($_SESSION["admin"])){
            echo "<li><a href='delogare.php'>Delogare</a></li>";
        }
        else{
            echo "<li><a href='logare.php'>Logare</a></li>";
        }
    ?>
    
    
</ul>