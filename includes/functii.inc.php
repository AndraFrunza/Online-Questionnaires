<?php
    
    //functii pt inregistrare
    function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

    function pwdMatch($parola, $parolaConfirm){
        $result;
        if($parola !== $parolaConfirm){
            $result=true;
        }
        else{
            $result=false;
        }
        return $result;
    }

    function userExists($conn, $email){
        $sql = "SELECT * FROM utilizatori WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../inregistrare.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData= mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $nume, $prenume, $email, $parola){
        $sql = "INSERT INTO utilizatori(nume,prenume,email,parola)
                VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn); //intoarce un obiect care va fi folosit ca
                                        //param la functia mysqli_stmt_prepare()
        if(!mysqli_stmt_prepare($stmt, $sql)){   //pregateste o intructiune pentru executie
            header("location: ../inregistrare.php?error=stmtFailed");
            exit();
        }

        $hashedPwd = password_hash($parola, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, 'ssss', $nume, $prenume, $email, $hashedPwd); //s=string
            //utilizata pt a lega variabilele de marcatorii paramteriilor unei instructiuni pregatite
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        
        header("location: ../inregistrare.php?error=none");
        exit();
    }

    //functii pt logare user

    function logareUser($conn, $email, $parola){
        $userExists = userExists($conn, $email);
        if($userExists === false){
            header("location: ../logare.php?error=wrongUser");
            exit();
        }

        $pwdHashed = $userExists["parola"];
        $checkPwd = password_verify($parola, $pwdHashed);

        if($checkPwd === false){
            header("location: ../logare.php?error=wrongPassw");
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["id"] =  $userExists["id"];
            $_SESSION["email"] =  $userExists["email"];
            header("location: ../index.php");
            exit();
        }

    }

    //functii pt logare admin

    function adminExists($conn, $email){
        $sql = "SELECT * FROM administrator WHERE nume = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../inregistrare.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData= mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }
    
    function logareAdmin($conn, $email, $parola){
        
        $adminExists = adminExists($conn, $email);
        if($adminExists === false){
            header("location: ../logare.php?error=wrongUser");
            exit();
        }

        $pwd = $adminExists["parola"];

        if($pwd !== $parola){
            header("location: ../logare.php?error=wrongPassw");
            exit();
        }
        else if($pwd === $parola){
            session_start();
            $_SESSION["id"] =  $adminExists["id"];
            $_SESSION["admin"] =  $adminExists["nume"];
            header("location: ../index.php");
            exit();
        }

    }

?>