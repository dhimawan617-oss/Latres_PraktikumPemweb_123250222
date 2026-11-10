<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] != true) {
        header("Location: login.php?message=not_logged_in");
        exit();
    }
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';
    $id = isset($_SESSION['id']) ? $_SESSION['id'] : '-1';
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
    <title>Home</title>
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

    <div class="container">
        <h2>Welcome Back <?php echo $username; ?></h2>
        <p class="mt-3 text-muted">What's on your mind today?</p>
        <a href="add_note.php"><button class="btn btn-secondary" id="create-button"><i class="bi bi-file-earmark-plus"></i> Create New Note</button></a>
        <div class="notes-area mt-3">
            <?php 
            include 'backend/connect.php';
            $query = mysqli_query($connect, "SELECT * FROM notes WHERE id_account='$id'");
            $increment = 0;
            
            while($data = mysqli_fetch_array($query)){
                $uniqueId = "content_" . $increment;
            ?>
            
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['title']; ?></h5>
                    <small class="text-muted d-block mb-3"><?php echo $data['date']; ?></small>
                    <div class="button-area">
                        <button class="btn btn-sm btn-outline-primary" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#<?php echo $uniqueId; ?>" 
                                aria-expanded="false" 
                                aria-controls="<?php echo $uniqueId; ?>">
                            Look Content
                        </button>
                        <a href="edit_note.php?id=<?php echo $data['id'];?>"><button class="btn btn-outline-success me-2 ms-2">
                            <i class="bi bi-pencil-square"></i>
                        </button></a>
                        <a href="backend/delete_note.php?id=<?php echo $data['id'];?>"><button class="btn btn-outline-danger">
                            <i class="bi bi-trash3-fill"></i>
                        </button></a>
                    </div>                    
                    <!-- Collapse Area -->
                    <div class="collapse mt-3" id="<?php echo $uniqueId; ?>">
                        <div class="card card-body bg-light border-0">
                            <?php echo $data['content']; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $increment++;
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle (Includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>