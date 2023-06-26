<?php
    session_start();
    include('connection.php');
    include('functions.php');
    $nameErr=$emailErr='';
    $passwordErr[]='';
    $first_name = $last_name = $email = ''; // Initialize variables for input values
    $login_attempts = 0;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Something was posted
        $first_name = sanitizeInput($_POST['firstName']);
        $last_name = sanitizeInput($_POST['lastName']);
        $email = sanitizeInput($_POST['email']);
        $password = sanitizeInput($_POST['password']);
        $confirmPassword = sanitizeInput($_POST['confirmPassword']);
        // Perform form validation
        $errors = 0;
        if (empty($first_name) || empty($last_name)) {
            $nameErr = "Name is required";
            $errors++;
        }
        if (empty($email)) {
            $emailErr = "Email is required";
            $errors++; 
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $errors++; 
        }
        
        if (empty($password)) {
            $passwordErr[] = "Password is required";
            $errors++;
        }
        elseif($password!==$confirmPassword){
            $passwordErr[]="Passwords do not match!!";
            $errors++;
        }
        elseif (strlen($password) < 6) {
            $passwordErr[] = "Password should be at least 6 characters long";
            $errors++;
        }
        if ($errors==0){
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Save to database using prepared statements
            $stmt = $con->prepare("INSERT INTO users (first_name, last_name, email, password, login_attempts) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $first_name, $last_name, $email, $hashedpassword, $login_attempts);
            $stmt->execute();
            $stmt->close();
            header("Location: login.php");
            die;
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="main-container">
        <div class="container-child">
            <h1>Register to  Clearspace</h1>
            <form action="" method="post">
                <div class="user-name">
                    <input type="text" name="firstName" placeholder="First Name" value="<?php echo $first_name; ?>">
                    <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $last_name; ?>">
                </div>
                <span class="error">* <?php echo $nameErr ?></span>
                
                <input type="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
                <span class="error">* <?php echo $emailErr ?></span>

                <input type="password" name="password" placeholder="Password">
                <span class="error">* 
                    <?php foreach ($passwordErr as $error): ?>
                                <?= $error; ?>
                    <?php endforeach ?>
                </span>
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
                <span class="error">* 
                    <?php foreach ($passwordErr as $error): ?>
                                <?= $error; ?>
                    <?php endforeach ?>
                </span>
                <input class="submit-button" type="submit" value="Register">
            </form>
        </div>
        <div class="lower-container">
            <div class="footer-child">
                <a href="https://forms.gle/exTtMwKNzS8iqvuy9">Rate</a>     
            </div>
            <hr>
            <div class="footer-child">
                <a href="login.php">Login</a>
            </div>
            <hr>
            <div class="footer-child">
                <a href="about.php">About</a>
            </div>
        </div>
    </div>
</body>
</html>
