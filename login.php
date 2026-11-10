<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Login</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('bluepolkadot.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #login-card {
            width: 60%;
            background-color: white;
            border-radius: 12px;
            padding: 5%;
            align-items: center;
        }

        #login-title {
            text-align: center;
        }

        #login-content {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5%;
        }

        #login-form {
            width: 60%;
        }

        #login-button {
            color: white;
            background-color: rgb(103, 169, 210);
            width: 100%;
        }

        p {
            color: grey;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="login-card">
            <div id="login-title">
                <h2>Welcome to MyNotes</h2>
                <p>Please login to your account first</p>
            </div>
            <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                if ($message == 'not_logged_in') {
                    echo '<div class="alert alert-warning" role="alert">Account is not logged in yet</div>';
                } elseif ($message == 'account_created') {
                    echo '<div class="alert alert-success" role="alert">Account is succesfully created, please login</div>';
                } elseif ($message == 'false') {
                    echo '<div class="alert alert-danger" role="alert">Username or password is wrong</div>';
                } elseif ($message == 'logout') {
                    echo '<div class="alert alert-primary" role="alert">Account is logged out</div>';
                } elseif ($message == 'account_deleted') {
                    echo '<div class="alert alert-primary" role="alert">Account is deleted</div>';
                }
            }
            ?>
            <div id="login-content">
                <div id="login-form">
                    <form method="POST" action="backend/process_login.php">
                        <label class="form-label"><i class="bi bi-person-fill"></i> Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <label class="form-label mt-3"><i class="bi bi-lock-fill"></i> Password</label>
                        <input type="password" class="form-control" name="password" id="password" minlength="8" maxlength="8" required>
                        <input type="submit" value="Login" class="btn mt-3" id="login-button">
                    </form>
                    <div class="text-center mt-3">
                        <a href="signup.php">Don't have an account? Signup here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>