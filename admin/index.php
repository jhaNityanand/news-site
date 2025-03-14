<?php
include "config.php";

if(isset($_SESSION['user_name']))
{
    header("location: {$hostname}/admin/post.php");
}
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
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
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }
                    else
                    {
                      echo '<a href="index.php" id="logo"><img src="images/'. $row['logo'] .'" alt=""/></a>';
                    }

                  }
                }
            ?>
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="password" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                        <?php 
                             include "config.php";

                            if(isset($_POST['login']))
                            {                         
                              $username = mysqli_real_escape_string($conn, $_POST['username']);
                              $password = mysqli_real_escape_string($conn, sha1($_POST['password']));

                              $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password = '{$password}'";
                              $result = mysqli_query($conn, $sql) or die("Failed !!!");

                              if(mysqli_num_rows($result) > 0)
                              {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    session_start();

                                    $_SESSION["user_name"] = $row['username'];
                                    $_SESSION["user_id"] = $row['user_id'];
                                    $_SESSION["user_role"] = $row['role'];

                                    header("location: {$hostname}/admin/post.php");
                                }
                              }
                              else
                              {
                                echo "<h3 style='color: red; text-align: center; margin: 10px 0;'> UserName and Password doesnot match !!! </h3>";
                              }
                            }  
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
