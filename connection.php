<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "traxex123lord";
$dbname = "clear-space";
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
