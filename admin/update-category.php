 <?php include "header.php"; 

 if($_SESSION['user_role'] == 0)
{
    header("location: {$hostname}/admin/post.php");
}

if(isset($_POST['submit']))
{
  include "config.php";

  $catid = mysqli_real_escape_string($conn, $_POST['cat_id']);
  $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);

  $sql = "UPDATE category SET category_name = '{$cat_name}' WHERE category_id = '{$catid}'";
  $result = mysqli_query($conn, $sql) or die("Failed !!!");
    
    echo $result;
    header("location: {$hostname}/admin/category.php");
}  
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                  <?php
                  include "config.php";

                  $category_id = $_GET['id'];
                  $sql = "SELECT * FROM category WHERE category_id = {$category_id}";
                  $result = mysqli_query($conn, $sql) or die("Failed !!!");

                  if(mysqli_num_rows($result) > 0) 
                  {
                    while($row = mysqli_fetch_assoc($result))  {                  
                  ?>
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
