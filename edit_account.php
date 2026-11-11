<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: login.php?message=not_logged_in");
        exit();
    }

    include "backend/connect.php";

    $id = $_SESSION['id'];

    $stmt = mysqli_prepare($connect, "SELECT username, email FROM account WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $account = mysqli_fetch_assoc($result);

    if (!$account) {
        header("Location: backend/logout.php");
        exit();
    }

    $username = $account['username'];
    $email    = $account['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Akun Saya</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg" id="main-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyNotes</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a href="account.php"><button class="btn btn-light me-3 active" id="detail-button">My Account</button></a>
                <a href="backend/logout.php"><button class="btn btn-danger" id="logout-button">Logout</button></a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <i class="bi bi-person-circle text-secondary" style="font-size: 4rem;"></i>
                            <h3 class="fw-bold mt-2">My Profile</h3>
                            <?php
                                if (isset($_GET['message'])) {
                                    $message = $_GET['message'];
                                      if ($message == 'used_username') {
                                        echo '<div class="alert alert-warning" role="alert">Username is already used, please use another username</div>';
                                    } elseif ($message == 'edit_successful') {
                                        echo '<div class="alert alert-success" role="alert">Account is updated successfully</div>';
                                    } elseif ($message == 'failed') {
                                        echo '<div class="alert alert-danger" role="alert">Failed to update account</div>';
                                    }
                                }
                            ?>
                        </div>
                        <hr class="mb-4">
                        <form method="POST" action="backend/process_edit_account.php">
                            <input type="hidden" name="id" value="<?php echo "$id" ?>">
                            <div class="mb-3">
                                <label class="form-label text-muted fw-semibold">Username</label>
                                <input class="form-control bg-light" name="username"  value="<?php echo $username; ?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted fw-semibold">Email</label>
                                <input class="form-control bg-light" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted fw-semibold">Password</label>
                                <input class="form-control bg-light" name="password" placeholder="Empty this if you dont want to change password...">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 text-white fw-semibold">
                                    <i class="bi bi-pencil-square me-1"></i> Save Change
                                </button>
                                <a href="account.php" class="btn btn-secondary px-4" >
                                    <i class="bi bi-arrow-left-circle me-1"></i> Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>