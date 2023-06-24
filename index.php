<?php 
    session_start();
    include('connection.php');
    include('functions.php');
    $user_data = check_login($con);
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
    <h1>This is the index</h1>
    <a href="logout.php">logout</a>
    <br>
    hello, <?= $user_data['first_name'].' '.$user_data['last_name'];?>
</body>
</html>