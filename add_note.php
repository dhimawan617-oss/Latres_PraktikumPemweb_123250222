<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: login.php?message=not_logged_in");
        exit();
    }
    $id_account = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Add Note</title>
    <style>
        body{
            background-color: rgb(219, 241, 255);
        }
        #form-content{
            text-align: left;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg" id="main-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyNotes</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <a href="account.php"><button class="btn btn-light me-3" id="detail-button">My Account</button></a>
                <a href="backend/logout.php"><button class="btn btn-danger" id="logout-button">Logout</button></a>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <h2>Create Your New Note</h2>
        <div class="card card-body mt-4" id="form-content">
            <form method="POST" action="backend/process_add_note.php">
                <input type="hidden" name="id_account" value="<?php echo "$id_account"; ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">My note</label>
                    <textarea id="content" name="content" rows="4" class="form-control" required></textarea>
                </div>
                <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <button type="submit" class="btn btn-primary mt-3">Save</button>
                <a href="index.php" class="btn btn-secondary mt-3">Cancel</a>
                </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>