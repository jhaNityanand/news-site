<?php

if($_SESSION['user_role'] == 0)
{
    header("location: {$hostname}/admin/post.php");
}

include "config.php";

$userid = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id = '{$userid}'";
$result = mysqli_query($conn, $sql) or die("Failed !!!");

	if($result){
		header("location: {$hostname}/admin/users.php");
	}else{
		 echo "<h3 style='color: red; text-align: center; margin: 10px 0;'> Can\'t delete user... </h3>";
	}

mysqli_close($conn);
?>