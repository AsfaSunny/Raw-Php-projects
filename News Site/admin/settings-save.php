<?php

include "config.php";

session_start();


if (empty($_FILES['new_logo']['name'])) {
	$file_name = $_POST['old_new_logo'];
} else {
	$errors = array();

	$file_name = $_FILES['new_logo']['name'];
	$file_size = $_FILES['new_logo']['size'];
	$file_temp_name = $_FILES['new_logo']['tmp_name'];
	$file_type = $_FILES['new_logo']['type'];
	$explode = explode('.', $file_name);
	$file_ext = end($explode);
	$extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');

	// echo $extensions = array('jpeg', 'jpg', 'png', 'JPEG', 'JPG', 'PNG');
	// die() //for problem and error detection purpose

	if (in_array($file_ext, $extensions) === false) {
		$errors[] = "This type of file not allowd. Please choose between PNG, JPG, JPEG";
	}

	if ($file_size == 2097152) {
		$errors[] = "File size must 2 mb or lower";
	}

	if (empty($errors) == true) {
		move_uploaded_file($file_temp_name, "images/".$file_name);
	} else {
		print_r($errors);
		die();
	}
}


$update_query = "UPDATE `settings` SET `website_name`='{$_POST["website_title"]}', `footer_desc`='{$_POST["footer_description"]}', `logo`='{$file_name}'";
//we can use field name as variable too......

    if (mysqli_query($db_connect, $update_query)) {
        header("Location: {$host_namelink}/admin/settings.php");
    } else {
    	echo "Update isn't possible";
    }

?>