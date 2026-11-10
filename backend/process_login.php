<?php
    session_start();
    include "connect.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $connect_database = mysqli_prepare($connect, "SELECT id, username, password FROM account WHERE username = ?");
    mysqli_stmt_bind_param($connect_database, "s", $username);
    mysqli_stmt_execute($connect_database);
    $resullt = mysqli_stmt_get_result($connect_database);
    $account = mysqli_fetch_assoc($resullt);

    if ($account && $account['password'] === $password) {
        $_SESSION['status'] = true;
        $_SESSION['username'] = $account['username'];
        $_SESSION['id'] = $account['id'];
        header("Location: ../index.php");
        exit(); 
    }else{
        header("Location: ../login.php?message=false");
        exit();
    }
?>