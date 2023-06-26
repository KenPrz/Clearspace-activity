<?php 
    session_start();
    include('connection.php');
    include('functions.php');
    $user_data = check_login($con);
    $name = $user_data['first_name'].' '.$user_data['last_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a id="logout-button" href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <h1> Welcome<?=' '.name_formatter($name)?>!</h1>
            <h2>What do you want to do?</h2>
        </div>
    </main>
</body>
</html>