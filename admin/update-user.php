<?php include "header.php"; 

if($_SESSION['user_role'] == 0)
{
    header("location: {$hostname}/admin/post.php");
}

if(isset($_POST['submit']))
{
  include "config.php";

  $userid = mysqli_real_escape_string($conn, $_POST['user_id']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $user = mysqli_real_escape_string($conn, $_POST['user']);
  $password = mysqli_real_escape_string($conn, sha1($_POST['password']));
  $role = mysqli_real_escape_string($conn, $_POST['role']);

  $sql = "UPDATE user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', password = '{$password}', role = '{$role}' WHERE user_id = '{$userid}'";
  $result = mysqli_query($conn, $sql) or die("Failed !!!");
    
    echo $result;
    header("location: {$hostname}/admin/users.php");
}  
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <?php
                  include "config.php";

                  $user_id = $_GET['id'];
                  $sql = "SELECT * FROM user WHERE user_id = {$user_id}";
                  $result = mysqli_query($conn, $sql) or die("Failed !!!");

                  if(mysqli_num_rows($result) > 0) 
                  {
                    while($row = mysqli_fetch_assoc($result))  {                  
                  ?>
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                       <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>"> 
                          <?php  
                          if($row['role'] == 1){
                            echo '<option value="0">Normal User</option>
                                  <option value="1" selected>Admin</option>';
                          } else{
                            echo '<option value="0" selected>Normal User</option>
                                  <option value="1">Admin</option>';
                          }
                          ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                      }
                    }
                  ?>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
