<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>signup</title>
    <style>
        body{
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

        #signup-card {
            width: 60%;
            background-color: white;
            border-radius: 12px;
            padding: 5%;
            align-items: center;
        }
        #signup-title{
            text-align: center;
        }
        #signup-content{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5%;
        }
        #signup-form {
            width: 60%;
        }
        #signup-button{
            color: white;
            background-color: rgb(103, 169, 210);
            width: 100%;
        }
        p{
            color: grey;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="signup-card">
            <div id="signup-title">
                <h2>Create Your Account</h2>
            </div>
            <?php
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                    if ($message == 'used_username') {
                        echo '<div class="alert alert-warning" role="alert">Username is already used, please use another username</div>';
                    } elseif ($message == 'failed') {
                        echo '<div class="alert alert-danger" role="alert">Failed to create account</div>';
                    }
                }
            ?>
            <div id="signup-content">
                <div id="signup-form">
                    <form method="POST" action="backend/process_signup.php">
                        <label class="form-label"><i class="bi bi-person-fill"></i> Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <label class="form-label mt-3"><i class="bi bi-envelope-at-fill"></i> Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <label class="form-label mt-3"><i class="bi bi-lock-fill"></i> Password</label>
                        <input type="password" class="form-control" name="password" id="password" minlength="8" maxlength="8" required>
                        <input type="submit" value="Signup" class="btn mt-3" id="signup-button">
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="login.php">Already have an account? Login here</a>
            </div>  
        </div>
    </div>
</body>

</html>