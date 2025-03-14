<?php

include "config.php";

$post_id = $_GET['id'];
$cat_id = $_GET['catid'];

$sql1 = "SELECT * FROM post WHERE post_id = {$post_id}";
  $result = mysqli_query($conn, $sql1) or die("Query Failed : Select");
  $row = mysqli_fetch_assoc($result);

  unlink("upload/".$row['post_img']);

// Category
$sql = "DELETE FROM post WHERE post_id = '{$post_id}';";
$sql .= "UPDATE category SET post = post - 1 WHERE category_id = {$cat_id}";
$result = mysqli_multi_query($conn, $sql) or die("Failed !!!");

	if($result){
		header("location: {$hostname}/admin/post.php");
	}else{
		 echo "<h3 style='color: red; text-align: center; margin: 10px 0;'> Failed !!! ... </h3>";
	}

mysqli_close($conn);
?>
