<?php 
    session_start();
    include('connection.php');
    include('functions.php');
    $loginErr = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Something was posted
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $errors = 0;
        if ($errors == 0) {
            // Read from database using prepared statements
            $stmt = $con->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result && $result->num_rows > 0) {
                $user_data = $result->fetch_assoc();
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.php");
                    die;
                }
            }
            $loginErr = 'Invalid username or password!';
        } else {
            $loginErr = 'Invalid username or password!';
        }    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="main-container">
        <div class="container-child">
            <h1>Login to Clearspace</h1>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Email Address">
                <input type="password" name="password" placeholder="Password">
                <span class="error"><?php echo $loginErr ?></span>
                <input class="submit-button" type="submit" value="Login">
            </form>
        </div>
        <div class="lower-container">
            <div class="footer-child">
                <a href="register.php">Register</a>
            </div>
            <hr>
            <div class="footer-child">
                <a href="#">Recover</a>
            </div>
            <hr>
            <div class="footer-child">
                <a href="about.php">About Us</a>
            </div>
        </div>
    </div>
</body>
</html>