<?php
include "config.php";

session_start();

if(!isset($_SESSION['user_name']))
{
    header("location: {$hostname}/admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-4">
            <?php
                include "config.php";

                $sql = "SELECT * FROM setting";

                $result = mysqli_query($conn, $sql) or die("Failed.");
                if(mysqli_num_rows($result) > 0)
                {
                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    if($row['logo'] == "")
                    {
                      echo '<a href="index.php"><h1>'.$row['website_name'].'</h1></a>';
                    }
                    else
                    {
                      echo '<a href="index.php" id="logo"><img src="images/'. $row['logo'] .'" height="70" width="100" alt=""/></a>';
                    }

                  }
                }
            ?>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-3">
                        <a href="logout.php" class="admin-logout" >Hello <?php echo $_SESSION['user_name']; ?>, logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Posts</a>
                            </li>
                            <?php
                                if($_SESSION['user_role'] == 1){
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="setting.php">Settings</a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
