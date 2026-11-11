<?php
    include "connect.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($connect, "SELECT id FROM account WHERE username = ?");
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../signup.php?message=used_username");
        exit();
    }

    //Menyimpan Akun Baru
    $stmt = mysqli_prepare($connect, "INSERT INTO account (username, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $password);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../login.php?message=account_created");
        exit();
    }
    else{
        header("Location: ../signup.php?message=failed");
    }
    exit();
?>