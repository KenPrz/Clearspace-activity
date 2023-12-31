<?php
function check_login($con)
{
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		$query = "select * from users where id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: login.php");
	die;

}
function sanitizeInput($input) {
	// Remove leading/trailing whitespaces
	$input = trim($input);
	// Remove backslashes
	$input = stripslashes($input);
	// Convert special characters to HTML entities
	$input = htmlspecialchars($input);
	return $input;
}

function name_formatter($name){
	$formattedName = strtolower($name);
	return $name = ucwords($formattedName);
}

function getTime($timeNow, $numOfHours) {
    $hoursLater = strtotime("+$numOfHours hours", $timeNow);
    $timestampFormatted = date('Y-m-d H:i:s', $hoursLater);
    return $timestampFormatted;
}