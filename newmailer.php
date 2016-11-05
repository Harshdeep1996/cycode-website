<?php

require_once "recaptchalib.php";

$secret = "6LfXRyUTAAAAALooJIJt2YuXzo7WlYuYeonh6MeG";
$response = null;
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) 
{
	$name = $_POST['name'];
	$name = htmlentities($name);
	$name = strip_tags($name);
	$email = $_POST['email'];
	$email = htmlentities($email);
	$email = strip_tags($email);
	$phone = $_POST['phone'];
	$phone = htmlentities($phone);
	$phone  = strip_tags($phone);
	$message = $_POST['message'];
	$message = htmlentities($message);
	$message  = strip_tags($message);
	$message = trim($message);
	$message = stripslashes($message);
	$message = htmlspecialchars($message);
	$formcontent= "From: $name \n Email: $email \n Phone: $phone \n Message: $message";
	$recipient = "harshcs.1996@gmail.com";
	$subject = "Contact Form";
	$mailheader = "From: $email";
	mail($recipient, $subject, $formcontent) or die("Error!");
	header('refresh:4;url=index.html');
	echo "<p align='center'> <font color = #2d334b margin-top:100px; size='10pt'>Thank you!</font></p>"; 
	echo "\n";
	echo "<p align='center'> <font color = #2d334b margin-top:100px; size='6pt'>You'll be redirected to the home page in 4 seconds..</font></p>"; 
} 
?>