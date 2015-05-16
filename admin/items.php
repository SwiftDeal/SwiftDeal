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

	$requesteditems = RequestedItem::find_all();
	$inactive_items = Item::inactive_items();
	$recent_items = Item::recent_items();
	
	$items = Item::find_all();

	include $dir_admin.'items.php';
?>