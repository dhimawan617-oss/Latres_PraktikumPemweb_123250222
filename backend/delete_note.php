<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php?message=not_logged_in");
        exit();
    }
    include 'connect.php';

    $id = $_GET['id'];

    $stmt = mysqli_prepare($connect, "DELETE FROM notes WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    header("Location: ../index.php");
    exit();
?>