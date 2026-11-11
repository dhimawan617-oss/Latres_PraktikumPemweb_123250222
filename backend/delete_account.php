<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: ../login.php?message=not_logged_in");
        exit();
    }
    include 'connect.php';

    $id = $_GET['id'];

    // catatan akun dihapus dulu (ada foreign key ke tabel account)
    $stmt = mysqli_prepare($connect, "DELETE FROM notes WHERE id_account = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($connect, "DELETE FROM account WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    session_destroy();
    header("Location: ../login.php?message=account_deleted");
    exit();
?>