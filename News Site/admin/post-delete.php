<?php

include "config.php";


$post_id = $_GET['id'];
$cate_id = $_GET['cate_id'];


$image_selector = "SELECT * FROM `post` WHERE `post_id` = '$post_id'";
$result = mysqli_query($db_connect, $image_selector) or die("Query Failed");
$data_row = mysqli_fetch_assoc($result);

unlink("upload/".$data_row['post_img']);



$query = "DELETE FROM `post` WHERE `post_id` = '$post_id';";
$query .= "UPDATE `category` SET `post`=`post`-1 WHERE `category_id`='$cate_id'";


if (mysqli_multi_query($db_connect, $query)) {
    header("Location: {$host_namelink}/admin/post.php");
}


?>