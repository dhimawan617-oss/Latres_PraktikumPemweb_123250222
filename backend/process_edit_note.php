<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php?message=not_logged_in");
        exit();
    }
    include 'connect.php';

    $id      = $_POST['id'];
    $title   = $_POST['title'];
    $content = $_POST['content'];
    $date    = $_POST['date'];

    $stmt = mysqli_prepare($connect, "UPDATE notes SET title = ?, content = ?, date = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $date, $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Gagal mengedit catatan. <a href='../index.php'>Kembali</a>";
    }
?>