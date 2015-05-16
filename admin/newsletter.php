<?php
	ob_start();
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';
	
	//Auth
	if(!$session->is_logged_in()){ redirect_to($public_controller.'login.php');}
	if($_SESSION['auth'] == 0){ redirect_to('../index.php');}

	//Checks Message
	$messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);

	if(isset($_POST['sendmail'])){
		$groups = $_POST['group'];
		$groups_id = implode(", ", $groups);
		mysql_query("INSERT INTO newsletter(user_id, subject, body, group_id, created, status) VALUES({$_SESSION['user_id']}, '{$_POST['subject']}', '{$_POST['body']}', '{$groups_id}', '{$created}', 1)");
		foreach($groups as $group_id){
			$result = mysql_query("SELECT * FROM newsletter_users WHERE group_id = {$group_id}");
			while($row=mysql_fetch_array($result)){
				$to = $row['email'];
				$subject = $_POST['subject'];
				$message = wordwrap($_POST['body']);
				$from = "Swiftdeal.in <info@swiftdeal.in>";
				$headers = "From: {$from}\n";
				$headers .= "Reply-To: {$from}\n";
				$headers .= "X-Mailer: PHP/".phpversion()."\n";
				$headers .= "MIME-Version: 1.0\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				mail($to, $subject, $message, $headers);
			}
		}
	}

	include $dir_admin.'newsletter.php';
?>