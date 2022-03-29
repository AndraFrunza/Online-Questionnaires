<?php
    session_start();
    session_unset();  //elibereaza toate variabilele de sesiune inregistrate
    session_destroy();
    header("location: index.php");  //redirectionare catre pagina principala
    exit();
?>