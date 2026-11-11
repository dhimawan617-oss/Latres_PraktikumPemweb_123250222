<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php?message=not_logged_in");
        exit();
    }
    include 'connect.php';

    $id       = $_POST['id'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    //mengecek username dipakai AKUN LAIN (id berbeda)
    $stmt = mysqli_prepare($connect, "SELECT id FROM account WHERE username = ? AND id <> ?");
    mysqli_stmt_bind_param($stmt, "si", $username, $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../edit_account.php?message=used_username");
        exit();
    }

    //Update, Membedakan Password kosong atau tidak
    if ($password === "") {
        $stmt = mysqli_prepare($connect, "UPDATE account SET username = ?, email = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssi", $username, $email, $id);
    } else {
        $stmt = mysqli_prepare($connect, "UPDATE account SET username = ?, email = ?, password = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $password, $id);
    }

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['username'] = $username;
        header("Location: ../edit_account.php?message=edit_successful");
    } else {
        header("Location: ../edit_account.php?message=failed");
    }
    exit();
?>