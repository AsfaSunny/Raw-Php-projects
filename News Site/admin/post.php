<?php

  include "header.php";

  include "config.php";
  
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">

              <?php
                $limit = 4;
                // $page = $_GET['page'];

                if (isset($_GET['page'])) {
                  $page = $_GET['page'];
                } else {
                  $page = 1;
                }
                
                $offset = ($page - 1) * $limit;


                if ($_SESSION['user_Role'] == '1') {
                  $query = "SELECT * FROM `post` 
                          LEFT JOIN `category` ON post.category = category.category_id
                          LEFT JOIN `user` ON post.author = user.user_id
                          ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                } elseif ($_SESSION['user_Role'] == '0') {
                  $query = "SELECT * FROM `post` 
                          LEFT JOIN `category` ON post.category = category.category_id
                          LEFT JOIN `user` ON post.author = user.user_id
                          WHERE post.author = {$_SESSION['userID']}
                          ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";
                }

                $result = mysqli_query($db_connect, $query) or die("Query Failed");

                if (mysqli_num_rows($result) > 0) {
              ?>  
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while ($data_row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $data_row['title']; ?></td>
                              <td><?php echo $data_row['category_name']; ?></td>
                              <td><?php echo $data_row['post_date']; ?></td>
                              <td><?php echo $data_row['username']; ?></td>

                              <td class='edit'>
                                <a href="update-post.php?id=<?php echo $data_row['post_id']; ?>"><i class='fa fa-edit'></i></a>
                              </td>
                              <td class='delete'>
                                <a href="post-delete.php?id=<?php echo $data_row['post_id']; ?>&cate_id=<?php echo $data_row['category']; ?>"><i class='fa fa-trash-o'></i></a>
                              </td>
                          </tr>
                        <?php 
                          $serial++;
                          } 
                        ?>
                      </tbody>
                  </table>
              <?php
                }


                $pagination_query = "SELECT * FROM `post`";
                $result_2 = mysqli_query($db_connect, $pagination_query) or die("Query Failed");

                if (mysqli_num_rows($result_2) > 0) {
                    $total_records = mysqli_num_rows($result_2);
                    $limit = 4;
                    $total_Page = ceil($total_records / $limit);

                    echo "<ul class='pagination admin-pagination'>";
                    if ($page > 1) {
                      echo "<li><a href='post.php?page=".($page - 1)."'>Prev</a></li>";
                    }

                    for ($p = 1; $p <= $total_Page; $p++) { 

                      if ($p == $page) { //for button active
                        $active = "active";
                      } else {
                        $active = "";
                      }

                      echo "<li class='{$active}'><a href='post.php?page={$p}'>{$p}</a></li>";
                    }

                    if ($page < $total_Page) {
                      echo "<li><a href='post.php?page=".($page + 1)."'>Next</a></li>";
                    }
                    echo "</ul>";
                  }
              ?>
                  <!-- <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul> -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
