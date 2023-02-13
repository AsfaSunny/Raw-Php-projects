<?php

include "config.php";

session_start();


if (isset($_FILES['FileUpload'])) {
	$errors = array();

	$file_name = $_FILES['FileUpload']['name'];
	$file_size = $_FILES['FileUpload']['size'];
	$file_temp_name = $_FILES['FileUpload']['tmp_name'];
	$file_type = $_FILES['FileUpload']['type'];
	$file_ext = end(explode('.', $file_name));
	$extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');

	if (in_array($file_ext, $extensions) === false) {
		$errors[] = "This type of file not allowd. Please choose between PNG, JPG, JPEG";
	}

	if ($file_size == 2097152) {
		$errors[] = "File size must 2 mb or lower";
	}

	$target_path = time() . "-" . basename($file_name);

	if (empty($errors) == true) {
		move_uploaded_file($file_temp_name, "upload/" . $target_path);
	} else {
		print_r($errors);
		die();
	}
}


$title = mysqli_real_escape_string($db_connect, $_POST['post_title']);
$description = mysqli_real_escape_string($db_connect, $_POST['description']);
$category = mysqli_real_escape_string($db_connect, $_POST['category']);
$date = date("d M, Y");
$author = $_SESSION['userID'];


$query = "INSERT INTO `post`(`title`, `description`, `category`, `post_date`, `author`, `post_img`) 
		VALUES ('$title', '$description', '$category', '$date', '$author', '$target_path');";

$query .= "UPDATE `category` SET `post`= `post` + 1 WHERE `category_id` = '$category'";


if (mysqli_multi_query($db_connect, $query)) {
	header("Location: {$host_namelink}/admin/post.php");
} else {
	echo "<div class='alert alert-danger'>Query Failed.</div>";
}



?>