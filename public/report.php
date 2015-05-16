<?php require_once '../includes/initialize.php';?>
<?php
	if(isset($_POST['message'])) {
		$msg = $_POST['message']; 
		$email = $_POST['email'];
		$item_id = $_GET['item_id'];
		log_action("report ", "item_id = ".$item_id." , Message : ".$msg);

		$to = $email;
		$subject = "Your Report on SwiftDeal.In";
		$from = "info@swiftdeal.in";
		$message 	=<<<EMAILBODY
Your report has been successfully submitted.

Report : {$msg}

By : {$name} at {$created}

Thanks and Regards,
SwiftDeal.In Team

EMAILBODY;

		$from = "{$from} <{$from}>";
		$headers = "From: {$from}\n";
		$headers .= "Reply-To: {$from}\n";
		$headers .= "X-Mailer: PHP/".phpversion()."\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/plain; charset=iso-8859-1";

		$result = mail($to, $subject, $message, $headers);

		$sql = "INSERT INTO report( email, item_id, created, message) VALUES('{$email}', '{$item_id}', '{$created}', '{$msg}')";

		if($result){
			if(mysql_query($sql)){ redirect_to("https://swiftdeal.in/viewitem.php?item_id=".$_GET['item_id']);} else{ alert("Couldnot save into DB");}
		} else{ alert("Error, we are currently working on it"); redirect_to("https://swiftdeal.in/viewitem.php?item_id=".$_GET['item_id']);}
	}

if($session->is_logged_in()){
	$user = User::find_by_id($session->user_id);
	$name = $user->name;
	$email = $user->email;
}

?>