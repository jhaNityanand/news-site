<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "news-sites";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
	die("Connection Failed" . mysqli_connect_error());
}

$hostname = "http://localhost/my-project/news-sites";

?>