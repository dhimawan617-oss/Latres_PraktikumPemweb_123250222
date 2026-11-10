<?php
    include "connect.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($connect, "SELECT id FROM account WHERE username = ?");
?>