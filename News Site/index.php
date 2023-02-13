<?php 
    include 'header.php';

    include 'config.php';
?>


    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">

                    <?php
                        $limit = 4;
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
                                                <a href="category.php?cid=<?php echo $data_row['category']; ?>">
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


                    $pagination_query = "SELECT * FROM `post`";
                    $result_2 = mysqli_query($db_connect, $pagination_query) or die("Query Failed");

                    if (mysqli_num_rows($result_2) > 0) {
                        $total_records = mysqli_num_rows($result_2);
                        $limit = 4;
                        $total_Page = ceil($total_records / $limit);

                        echo "<ul class='pagination'>";
                        if ($page > 1) {
                          echo "<li><a href='index.php?page=".($page - 1)."'>Prev</a></li>";
                        }

                        for ($p = 1; $p <= $total_Page; $p++) { 

                          if ($p == $page) { //for button active
                            $active = "active";
                          } else {
                            $active = "";
                          }

                          echo "<li class='{$active}'><a href='index.php?page={$p}'>{$p}</a></li>";
                        }

                        if ($page < $total_Page) {
                          echo "<li><a href='index.php?page=".($page + 1)."'>Next</a></li>";
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
