<?php
session_start();
$result;

// check if user exist before login
function userExist($connection, $emailAddress, $password){
    $query = "SELECT * FROM admin WHERE email = ? AND password = ?;";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $query)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $emailAddress, $password);
    mysqli_stmt_execute($stmt);
    $getResult = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($getResult)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

// user login
function loginUser($connection, $emailAddress, $password){
    $existingUser = userExist($connection, $emailAddress, $password);
    if($existingUser !== false){
        $_SESSION["emailAddress"] = $existingUser["email"];
        $_SESSION["fullname"] = $existingUser["fullname"];
        header("location: ../dashboard.php?success=successful");
    }
}