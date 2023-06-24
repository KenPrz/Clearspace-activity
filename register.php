<?php
    session_start();
    include('connection.php');
    include('functions.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
		$email = $_POST['email'];
		$password =$_POST['password'];
		if(!empty($first_name)&& !empty($last_name) && !empty($email) && !empty($password) && !is_numeric($user_name))
		{
            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
			//save to database
			$query = "insert into users (first_name, last_name, email, password) values ('$first_name','$last_name','$email','$hashedpassword')";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
            <h1>Register to  Clearspace</h1>
            <form action="" method="post">
                <div class="user-name">
                    <input type="text" name="firstName" placeholder="First Name">
                    <input type="text" name="lastName" placeholder="Last Name">
                </div>
                <input type="email" name="email" placeholder="Email Address">
                <input type="password" name="password" placeholder="Password">
                <input class="submit-button" type="submit" value="Register">
            </form>
        </div>
        <div class="lower-container">
            <div class="footer-child">
                <a href="login.php">Login</a>
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