<?php
    if(isset($_POST["loginbtn"])){
        // declearation of variable
        $emailAddress = $_POST["email"];
        $password = $_POST["password"];

        // Add database.inc and function.inc
        require_once "database.inc.php";
        require_once "function.inc.php";

        // check if user exist in the database
        if(userExist($connection, $emailAddress, $password)===false){
            header("location: ../index.php?error=wronginput");
            exit();
        }

        loginUser($connection, $emailAddress, $password);
    }else{
        header("Wrong input!!!");
    }
