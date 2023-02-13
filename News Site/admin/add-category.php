<?php 
  include "header.php";

  include "config.php";

  if ($_SESSION['user_Role'] == '0') {
    header("Location: {$host_namelink}/admin/post.php");
  }


  if (isset($_POST['save'])) {
    $category_name = mysqli_real_escape_string($db_connect, $_POST['category']);

    //first e we'll have to check je oi category aghe thekei  exist kore kina
    $check_query = "SELECT `category_name` FROM `category` WHERE `category_name` = '{$category_name}'";
    $check_result = mysqli_query($db_connect, $check_query) or die("Query Failed");

    if (mysqli_num_rows($check_result) > 0) {
      echo "<p style = 'color: red; text-align: center;'>This Category already exist!!!</p>";
    } else {
      $add_query = "INSERT INTO `category`(`category_name`) VALUES ('$category_name')";

      if (mysqli_query($db_connect, $add_query)) {
        header("Location: {$host_namelink}/admin/category.php");
      }
    }
  }
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">

                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">

                          <label>Category Name</label>
                          <input type="text" name="category" class="form-control" placeholder="Category Name" required>

                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->

              </div>
          </div>
      </div>
  </div>

<?php include "footer.php"; ?>
