<?php 
ob_start();
require_once '../includes/initialize.php';

	if(isset($_POST['body'])) {
		$item = Item::find_by_id('id', $_POST['itemid']);
		$body = $_POST['body'];
		$user = User::find_by_id($item->user_id);
		
		//E-mail Send
		$from = $_POST['email'];
		$to = $user->email;
		$subject = "{$from} wants to buy your {$item->title} at SwiftDeal.In";
		$message 	=<<<EMAILBODY
hi {$user->name}

{$body}

By : {$from} at {$created}
Item : http://swiftdeal.in/viewitem.php?item_id={$item->id}

Sent Via
Swiftdeal.in

EMAILBODY;
		
		$from = "{$from} <{$from}>";
		$headers = "From: {$from}\n";
		$headers .= "Reply-To: {$from}\n";
		$headers .= "X-Mailer: PHP/".phpversion()."\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/plain; charset=iso-8859-1";
	
		$result = mail($to, $subject, $message, $headers);
		
		if($result) {
			log_action('message', "message to sender ", "{$to}, {$subject}, {$message}, {$from}}");
			$session->message = "Submitted Successfully";
			redirect_to("https://swiftdeal.in/viewitem.php?item_id=".$_POST['itemid']);
		} else{
			echo "Something went wrong, currently we are working on it.";
			log_action('error', "message to sender ", "{$to}, {$subject}, {$message}, {$from}}");
		}
	}
?>