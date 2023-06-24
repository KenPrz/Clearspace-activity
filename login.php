<?php 
    session_start();
    include('connection.php');
    include('functions.php');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            // Read from database
            $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($con, $query);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.php");
                    die;
                }
            }
            
            echo "Wrong username or password!";
        } else {
            echo "Wrong username or password!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <div class="container-child">
            <h1>Login to Clearspace</h1>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Email Address">
                <input type="password" name="password" placeholder="Password">
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