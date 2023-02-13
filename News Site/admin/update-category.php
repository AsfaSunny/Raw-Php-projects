<?php
  include "header.php";

  include "config.php";

  if ($_SESSION['user_Role'] == '0') {
    header("Location: {$host_namelink}/admin/post.php");
  }


  if (isset($_POST['submit'])) {
    $category_id = mysqli_real_escape_string($db_connect, $_POST['cate_id']);
    $category_name = mysqli_real_escape_string($db_connect, $_POST['cate_name']);

    $update_query = "UPDATE `category` SET `category_name`='$category_name' WHERE `category_id`='{$category_id}'";

    if (mysqli_query($db_connect, $update_query)) {
        header("Location: {$host_namelink}/admin/category.php");
    }
  }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php
                $update_id = $_GET['id'];
                $query = "SELECT * FROM `category` WHERE `category_id` = '{$update_id}'";
                $result = mysqli_query($db_connect, $query) or die("Query Failed");

                if (mysqli_num_rows($result) > 0) {
                  while ($category_row = mysqli_fetch_assoc($result)) {
              ?>

                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cate_id"  class="form-control" value="<?php echo $category_row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cate_name" class="form-control" value="<?php echo $category_row['category_name']; ?>"  placeholder="" required>
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
