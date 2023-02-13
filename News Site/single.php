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

                        $page_id = $_GET['id'];


                        $query = "SELECT * FROM `post` 
                          LEFT JOIN `category` ON post.category = category.category_id
                          LEFT JOIN `user` ON post.author = user.user_id
                          WHERE post.post_id = '$page_id'";
                          $result = mysqli_query($db_connect, $query) or die("Query Failed");

                        if (mysqli_num_rows($result) > 0) {
                            while ($data_row = mysqli_fetch_assoc($result)) {
                    ?>   

                        <div class="post-content single-post">
                            <h3><?php echo $data_row['title']; ?></h3>
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
                            <img class="single-feature-image" src="admin/upload/<?php echo $data_row['post_img']; ?>" alt=""/>
                            
                            <p class="description">
                                <?php echo $data_row['description']; ?>
                            </p>
                        </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
