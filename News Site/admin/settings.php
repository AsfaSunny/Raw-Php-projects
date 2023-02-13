<?php 

include "header.php";

include "config.php";

?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">

              <?php 
              	$setting_query = "SELECT * FROM `settings`";
              	$setting_result = mysqli_query($db_connect, $setting_query) or die("Query Failed: Settings.");

              	if (mysqli_num_rows($setting_result) > 0) {
            		while ($data_row = mysqli_fetch_assoc($setting_result)) {
              ?>	

                  <!-- Form -->
                  <form  action="settings-save.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Website Title Name</label>
                          <input type="text" name="website_title" class="form-control" autocomplete="off" value="<?php echo $data_row['website_name']; ?>" required>
                      </div>

                      <div class="form-group">
						<label for="exampleInputPassword1">Website Logo image</label>
                        <input type="file" name="new_logo">
                		<img src="images/<?php echo $data_row['logo']; ?>" height="150px">
						<input type="hidden" name="old_logo" value="<?php echo $data_row['logo']; ?>">
                      </div>

                      <div class="form-group">
                          <label for="exampleInputPassword1">Footer Text</label>
                          <textarea name="footer_description" class="form-control" rows="5"  required><?php echo $data_row['footer_desc']; ?></textarea>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->

              <?php 
          			}
          		} 
              ?>

              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
