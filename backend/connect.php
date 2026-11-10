<?php
    $connect = mysqli_connect("localhost", "root", "", "notes_database");

    if (!$connect) {
        die("Gagal Menghubungkan: " . mysqli_connect_error());
    }
?>