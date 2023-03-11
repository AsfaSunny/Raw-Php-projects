<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['websites'];
$message = $_POST['msg'];

// echo $name;

if (!empty($email) && !empty($message)) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		// $receiver = "arifulasafakesunny@gmail.com";
		// $subject = "From: $name <$email>";
		// $body = "Name: $name \nEmail: $email \nPhone: $phone \nWebsite: $website \nMessage: $message \n\n Regards, $name";
		// $sender = "From: $email";

		echo "Your message has been sent!";

		// if (mail($receiver, $subject, $body, $sender)) {
		// 	echo "Your message has been sent!";
		// } else {
		// 	echo "Sorry, Failed to send your message";
		// }
	} else {
		echo "Enter a valid Email";
	}
} else {
	echo "Your Email and A Message must be required!";
}


?>