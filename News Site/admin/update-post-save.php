<?php

include "config.php";

session_start();


if (empty($_FILES['new_image']['name'])) {
	$target_path = $_POST['old_image'];
} else {
	$errors = array();

	unlink("upload/".$_POST['old_image']);

	$file_name = $_FILES['new_image']['name'];
	$file_size = $_FILES['new_image']['size'];
	$file_temp_name = $_FILES['new_image']['tmp_name'];
	$file_type = $_FILES['new_image']['type'];
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


$update_query = "UPDATE `post` SET `title`='{$_POST["post_title"]}', `description`='{$_POST["description"]}', `category`='{$_POST["category"]}', `post_img`='{$target_path}' WHERE `post_id`='{$_POST["post_id"]}';";
//we can use field name as variable too......

if ($_POST['old_category'] != $_POST['category']) {
	$update_query .= "UPDATE `category` SET `post`=`post`-1 WHERE `category_id`={$_POST['old_category']};";
	$update_query .= "UPDATE `category` SET `post`=`post`+1 WHERE `category_id`= {$_POST['category']}";
}


$update_result = mysqli_multi_query($db_connect, $update_query);


    if ($update_result) {
        header("Location: {$host_namelink}/admin/post.php");
    } else {
    	echo "Update isn't possible";
    }

?>