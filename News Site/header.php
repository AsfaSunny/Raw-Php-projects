<?php
// print_r(basename($_SERVER['PHP_SELF']));
// print_r($_SERVER['PHP_SELF']);
// print_r($_SERVER);
include 'config.php';

$present_page = basename($_SERVER['PHP_SELF']);
switch ($present_page) {
    case 'single.php':
        if (isset($_GET['id'])) {
            $title_query = "SELECT * FROM `post` WHERE `post_id` = {$_GET['id']}";
            $title_result = mysqli_query($db_connect, $title_query);
            $title_row = mysqli_fetch_assoc($title_result);
            $page_title = $title_row['title'];
        } else {
            $page_title = "No Page Found";
        }
        break;

    case 'category.php':
        if (isset($_GET['cid'])) {
            $title_query = "SELECT * FROM `category` WHERE `category_id` = {$_GET['cid']}";
            $title_result = mysqli_query($db_connect, $title_query);
            $title_row = mysqli_fetch_assoc($title_result);
            $page_title = $title_row['category_name'] . " News";
        } else {
            $page_title = "No Page Found";
        }
        break;

    case 'author.php':
        if (isset($_GET['authorid'])) {
            $title_query = "SELECT * FROM `user` WHERE `user_id` = {$_GET['authorid']}";
            $title_result = mysqli_query($db_connect, $title_query);
            $title_row = mysqli_fetch_assoc($title_result);
            $page_title = "News by " . $title_row['first_name'] . " " . $title_row['last_name'];
        } else {
            $page_title = "No Page Found";
        }
        break;

    case 'search.php':
        if (isset($_GET['search'])) {
            $page_title = $_GET['search'] . " Search Result";
        } else {
            $page_title = "No Search Result Found";
        }
        break;
    
    default:
        $page_title =  "News-site";
        break;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
            <?php 
                $setting_query = "SELECT * FROM `settings`";
                $setting_result = mysqli_query($db_connect, $setting_query) or die("Query Failed: Settings.");

                if (mysqli_num_rows($setting_result) > 0) {
                    while ($settings_row = mysqli_fetch_assoc($setting_result)) {
                        if ($settings_row['logo'] == "") {
                            echo '<a href="index.php"><h1>' . $settings_row["website_name"] . '</h1></a>';
                        } else {
                            echo '<a href="index.php" id="logo"><img src="admin/images/' . $settings_row['logo'] . '"></a>';
                        }
                    }
                }
            ?>    
            </div>
            <!-- /LOGO -->
            
        </div>
    </div>
</div>
<!-- /HEADER -->



<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
                include 'config.php';
                $active = "";

                if (isset($_GET['cid'])) {
                    $Cate_getID = $_GET['cid'];
                }


                $category_query = "SELECT * FROM `category` WHERE `post` > 0";
                $result = mysqli_query($db_connect, $category_query) or die("Query Failed: Category.");

                if (mysqli_num_rows($result) > 0) {

            ?>

                <ul class='menu'>
                    <li><a href='<?php echo $host_namelink; ?>'>Home</a></li>
                <?php
                    while ($cate_row = mysqli_fetch_assoc($result)) {

                        if (isset($Cate_getID)) {
                            if ($cate_row['category_id'] == $Cate_getID) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                        }



                        echo "<li><a class='$active' href='category.php?cid={$cate_row["category_id"]}'>{$cate_row['category_name']}</a></li>";
                    }
                ?>
                </ul>

            <?php
                }
            ?>

            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
