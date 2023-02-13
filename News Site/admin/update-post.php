<?php 

include "header.php";

include "config.php";


//other user's post access block
if ($_SESSION['user_Role'] == 0) {
    $post_id = $_GET['id'];

    $query_1 = "SELECT `author` FROM `post` WHERE `post_id` = {$post_id}";
    $result_1 = mysqli_query($db_connect, $query_1) or die("Query Failed: Post Block. ");

    $row_1 = mysqli_fetch_assoc($result_1);

    if ($row_1['author'] != $_SESSION['userID']) {
        header("Location: {$host_namelink}/admin/post.php");
    }
}

?>

<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
    <?php
        $post_id = $_GET['id'];

        $query = "SELECT post.post_id, post.title, post.description, post.category, post.post_img, category.category_name FROM `post` 
                LEFT JOIN `category` ON post.category = category.category_id
                LEFT JOIN `user` ON post.author = user.user_id
                WHERE post.post_id = {$post_id}";
        $result = mysqli_query($db_connect, $query) or die("Query Failed");

        if (mysqli_num_rows($result) > 0) {
            while ($data_row = mysqli_fetch_assoc($result)) {
    ?>    

        <!-- Form for show edit-->
        <form action="update-post-save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $data_row['post_id']; ?>" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $data_row['title']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="description" class="form-control"  required rows="5"><?php echo $data_row['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                    <option disabled>Select Category</option>
                <?php 
                $cate_option = "SELECT * FROM `category`";
                $option_result = mysqli_query($db_connect, $cate_option) or die("Query Failed");

                if (mysqli_num_rows($option_result) > 0) {
                    while ($cate_row = mysqli_fetch_assoc($option_result)) {
                        if ($data_row['category'] == $cate_row['category_id']) {
                            $selected = "selected";
                        } else {
                            $selected = "";
                        }

                        echo "<option value='{$cate_row['category_id']}' $selected>{$cate_row['category_name']}</option>";
                    }
                }
                ?>
                </select>
                <input type="hidden" name="old_category" class="form-control" value="<?php echo $data_row['category']; ?>">
            </div>

            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new_image">
                <img src="upload/<?php echo $data_row['post_img']; ?>" height="150px">
                <input type="hidden" name="old_image" value="<?php echo $data_row['post_img']; ?>">
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      <?php
            }
        }
      ?>  

      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
