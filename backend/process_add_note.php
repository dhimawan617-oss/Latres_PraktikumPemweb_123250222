<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php?message=not_logged_in");
        exit();
    }
    include 'connect.php';

    $id_account = $_POST['id_account'];
    $title      = $_POST['title'];
    $content    = $_POST['content'];
    $date       = $_POST['date'];

    $stmt = mysqli_prepare($connect, "INSERT INTO notes (id_account, title, content, date) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isss", $id_account, $title, $content, $date);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Gagal menyimpan catatan. <a href='../index.php'>Kembali</a>";
    }
?>