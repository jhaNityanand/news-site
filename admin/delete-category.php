<?php

if($_SESSION['user_role'] == 0)
{
    header("location: {$hostname}/admin/post.php");
}

include "config.php";

$cat_id = $_GET['id'];

$sql = "DELETE FROM category WHERE category_id = '{$cat_id}'";
$result = mysqli_query($conn, $sql) or die("Failed !!!");

	if($result){
		header("location: {$hostname}/admin/category.php");
	}else{
		 echo "<h3 style='color: red; text-align: center; margin: 10px 0;'> Can\'t delete category... </h3>";
	}

mysqli_close($conn);
?>