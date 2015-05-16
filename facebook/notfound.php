<?php
include '../includes/initialize.php';
$keywords = $_GET['keywords'];
if($_GET['subscribe']=='true'){
	if(mysql_query("UPDATE notfound SET active=1 WHERE email='{$_GET['email']}'")){
		 echo "Verified Successfully, Thanks Swiftdeal Team";
	}
}
if($_GET['subscribe']=='false'){
	if(mysql_query("UPDATE notfound SET active=0 WHERE email='{$_GET['email']}'")){
		$message = "Unsubscribed Successfully, Please Give Feedback";
	}
}
if(isset($_POST['subscribe'])){
	$email = $_POST['email'];
	$query = "INSERT INTO notfound(email, keywords, created, active) VALUES('{$email}', '{$keywords}', '{$created}', '0')";
	$result = mysql_query($query);
	if($result){
		$to = $email;
		$subject = "E-mail Verification";
		$body 	=<<<EMAILBODY
Hi there,
You have been Successfully added to our mailing list on Swiftdeal.in.
for the Product {$keywords}

Click on the link to verify :  https://swiftdeal.in/public/notfound.php?subscribe=true&email={$email}

Add any of your unused stuffs and make profit sitting at home : https://swiftdeal.in/public/addstuffs.php

For any Doubt/Help visit : https://swiftdeal.in/community/


At {$created}.

Thanks & Regards,
Swiftdeal Team.

EMAILBODY;
		$from = "Swiftdeal.in <info@swiftdeal.in>";
		$headers = "From: {$from}\n";
		$headers .= "Reply-To: {$from}\n";
		if(mail($to, $subject, $body, $headers)){
			echo "Successfully Added Check your email for Verification";
			echo '<br><a href="../index.php">Go Home</a>';
		}
	}else{
		log_action('error', 'Query Problem', "Couldnot insert in database {$query}");
		echo 'Query Problem';
	}
}
?>