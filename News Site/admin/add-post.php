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

                  <!-- Form -->
                  <form  action="post-save.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="description" class="form-control" rows="5"  required></textarea>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option disabled> Select Category</option>
                          <?php 
                            $cate_option = "SELECT * FROM `category`";
                            $result = mysqli_query($db_connect, $cate_option) or die("Query Failed");

                            if (mysqli_num_rows($result) > 0) {
                              while ($cate_row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$cate_row['category_id']}'>{$cate_row['category_name']}</option>";
                              }
                            }
                          ?>    
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="FileUpload" required>
                      </div>

                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->

              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
