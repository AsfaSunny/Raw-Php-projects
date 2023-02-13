<?php 
    include 'header.php';

    include 'config.php';

    $Cate_getID = $_GET['cid'];

    $pagination_query = "SELECT * FROM `category` WHERE `category_id` = '$Cate_getID'";
    $result_2 = mysqli_query($db_connect, $pagination_query) or die("Query Failed");
    $Only_postRow = mysqli_fetch_assoc($result_2);
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading"><?php echo $Only_postRow['category_name']; ?></h2>


                    <?php
                        // $Cate_getID = $_GET['cid'];


                        $limit = 3;
                        // $page = $_GET['page'];

                        if (isset($_GET['page'])) {
                          $page = $_GET['page'];
                        } else {
                          $page = 1;
                        }
                        
                        $offset = ($page - 1) * $limit;


                        $query = "SELECT * FROM `post` 
                          LEFT JOIN `category` ON post.category = category.category_id
                          LEFT JOIN `user` ON post.author = user.user_id
                          WHERE post.category = '$Cate_getID'
                          ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                          $result = mysqli_query($db_connect, $query) or die("Query Failed");

                        if (mysqli_num_rows($result) > 0) {
                            while ($data_row = mysqli_fetch_assoc($result)) {
                    ?>

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $data_row['post_id']; ?>">
                                        <img src="admin/upload/<?php echo $data_row['post_img']; ?>" height="150px">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href="single.php?id=<?php echo $data_row['post_id']; ?>"><?php echo $data_row['title']; ?></a></h3>

                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href="category.php?cid=<?php echo $data_row['category_id']; ?>">
                                                    <?php echo $data_row['category_name']; ?>
                                                </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?authorid=<?php echo $data_row['author']; ?>'>
                                                    <?php echo $data_row['username']; ?>
                                                </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $data_row['post_date']; ?>
                                            </span>
                                        </div>

                                        <p class="description">
                                            <?php echo substr($data_row['description'], 0, 100) . '.....'; ?>
                                        </p>
                                        
                                        <a class='read-more pull-right' href="single.php?id=<?php echo $data_row['post_id']; ?>">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    }


//we made the code comment and paste it in the top, working same ways but for out web title we have to do the job this way:
                    // $pagination_query = "SELECT `post` FROM `category` WHERE `category_id` = '$Cate_getID'";
                    // $result_2 = mysqli_query($db_connect, $pagination_query) or die("Query Failed");
                    // $Only_postRow = mysqli_fetch_assoc($result_2);

                    if (mysqli_num_rows($result_2) > 0) {
                        $total_records = $Only_postRow['post'];
                        $limit = 3;
                        $total_Page = ceil($total_records / $limit);

                        echo "<ul class='pagination'>";
                        if ($page > 1) {
                          echo "<li><a href='category.php?cid={$Cate_getID}&page=".($page - 1)."'>Prev</a></li>";
                        }

                        for ($p = 1; $p <= $total_Page; $p++) { 

                          if ($p == $page) { //for button active
                            $active = "active";
                          } else {
                            $active = "";
                          }

                          echo "<li class='{$active}'><a href='category.php?cid={$Cate_getID}&page={$p}'>{$p}</a></li>";
                        }

                        if ($page < $total_Page) {
                          echo "<li><a href='category.php?cid={$Cate_getID}&page=".($page + 1)."'>Next</a></li>";
                        }
                        echo "</ul>";
                      }
                    ?>


                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
