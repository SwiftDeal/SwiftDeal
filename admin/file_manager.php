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

	include $dir_admin.'file_manager.php';
?>