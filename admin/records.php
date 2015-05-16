<?php
	ob_start();
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

	//Auth
	if(!$session->is_logged_in()){ redirect_to($public_controller.'login.php');}
	if($_SESSION['auth'] == 0){ redirect_to('../index.php');}

	//Checks Message
	$messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);
	
	//calls
	$records = Call::find_all();
	
	//insert record
	if(isset($_POST['insert_record'])){
		$call = new Call();
		$call->name = trim($_POST['name']);
		$call->user_id = $session->user_id;
		$call->phone = trim($_POST['phone']);
		$call->email = trim($_POST['email']);
		$call->category = trim($_POST['category']);
		$call->details = trim($_POST['details']);
		$call->reminder = trim($_POST['reminder']);
		$call->address = trim($_POST['address']);
		$call->city = trim($_POST['city']);
		$call->call_history = 'by '.$session->name.' on '.$time.' ';
		$call->created = $time;
		$call->status = trim($_POST['status']);
		$call->validity = '1';
		
		if($call->save()){
			log_action('calls', 'Call', "to {$call->name} by {$session->user_id}-{$session->name}");
		}
	}

	include $dir_admin.'records.php';
?>