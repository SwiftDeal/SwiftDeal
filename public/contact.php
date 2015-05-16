<?php
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';

	//facebook
	$fb_title = "";
	$fb_type = "";
	$fb_image_url = "";
	$fb_url = "";
	$fb_description = "";
	$fb_admin_userid = "";

	//twitter
	$tw_card = "";
	$tw_url = "";
	$tw_title = "";
	$tw_description = "";
	$tw_image = "";
	
	//meta
	$meta_description = "Hi, nice to see you contact our marketing department.";
	$meta_keywords = "Welcome to Swiftdeal.in a place to put your offline buisness to online";
	$meta_author = "SwiftDeal.in";

	if(isset($_POST['submit'])){
		$to = "info@swiftdeal.in";
		$subject = "Contact SwiftDeal.in";
		$from = $_POST['email'];
		$body 	=<<<EMAILBODY
Swiftdeal Contact Page:
		
{$_POST['body']}

At {$created}

EMAILBODY;
		$headers = "From: {$from}\n";
		$headers .= "Reply-To: {$from}\n";
		$headers .= "X-Mailer: PHP/".phpversion()."\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
	
		$result = mail($to, $subject, $body, $headers);
	
	    if ($result) {
	      log_action('contact', 'Message', "From {$from} wrote {$body}.");
		  $message = "Successfully Submitted. We will Contact you in 24 Hours.";
	      redirect_to("contact.php");
	    } else { $message = "There was an error that prevented the comment from being saved.";}
	}
	
	if(isMobile()){
		include $dir_public_mobile.'contact.php';
	}elseif(isFacebook()){
		include $dir_facebook.'contact.php';
	}else{
		include $dir_public.'contact.php';
	}
?>