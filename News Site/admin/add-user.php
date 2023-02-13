<?php 
  include "header.php";

  include "config.php";

  if ($_SESSION['user_Role'] == '0') {
    header("Location: {$host_namelink}/admin/post.php");
  }


  if (isset($_POST['save'])) {
    $fname = mysqli_real_escape_string($db_connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($db_connect, $_POST['lname']);
    $user_name = mysqli_real_escape_string($db_connect, $_POST['user']);
    $password = mysqli_real_escape_string($db_connect, md5($_POST['password']));
    $role = mysqli_real_escape_string($db_connect, $_POST['role']);

//first e check or search korbe if username exist or not
    $check_query = "SELECT `username` FROM `user` WHERE `username` = '{$user_name}'";
    $check_result = mysqli_query($db_connect, $check_query) or die("Query Failed");


    if (mysqli_num_rows($check_result) > 0) {
      echo "<p style = 'color: red; text-align: center;'>This username is already taken</p>";
    } else {
      $add_query = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) 
                  VALUES ('$fname', '$lname', '$user_name', '$password', '$role')";

      if (mysqli_query($db_connect, $add_query)) {
        header("Location: {$host_namelink}/admin/users.php");
      }
    }
  }


?>



  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->

                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" autocomplete="off">

                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>

                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>

                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>

                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>

                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />

                  </form>
                   <!-- Form End-->

               </div>
           </div>
       </div>
   </div>


<?php include "footer.php"; ?>
