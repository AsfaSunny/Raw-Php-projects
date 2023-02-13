<?php 
  include "header.php";

  include "config.php";

  if ($_SESSION['user_Role'] == '0') {
    header("Location: {$host_namelink}/admin/post.php");
  }


  if (isset($_POST['submit'])) {
    $user_id = mysqli_real_escape_string($db_connect, $_POST['user_id']);
    $fname = mysqli_real_escape_string($db_connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($db_connect, $_POST['lname']);
    $user_name = mysqli_real_escape_string($db_connect, $_POST['user']);
    $role = mysqli_real_escape_string($db_connect, $_POST['role']);

    $update_query = "UPDATE `user` 
                  SET `first_name`='$fname',`last_name`='$lname',`username`='$user_name',`role`='$role'
                  WHERE `user_id`='{$user_id}'";

    if (mysqli_query($db_connect, $update_query)) {
        header("Location: {$host_namelink}/admin/users.php");
    }
  }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">

              <?php
                $update_id = $_GET['id'];
                $query = "SELECT * FROM `user` WHERE `user_id` = '{$update_id}'";
                $result = mysqli_query($db_connect, $query) or die("Query Failed");

                if (mysqli_num_rows($result) > 0) {
                  while ($data_row = mysqli_fetch_assoc($result)) {
              ?>
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $data_row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $data_row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $data_row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" value="<?php echo $data_row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $data_row['role']; ?>">
                              <?php
                                if ($data_row['role'] == 1) {
                                    echo '<option value="0">Normal User</option>
                                          <option value="1" selected>Admin</option>';
                                  } else {
                                    echo '<option value="0" selected>Normal User</option>
                                          <option value="1">Admin</option>';
                                  }
                              ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              <?php 
                }
              }
              ?>
              </div>
          </div>
      </div>
  </div>


<?php include "footer.php"; ?>
