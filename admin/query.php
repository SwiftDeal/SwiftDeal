<?php
	//Auth
	if(!$session->is_logged_in()){ redirect_to($public_controller.'login.php');}
	if($_SESSION['auth'] == 0){ redirect_to('../index.php');}

	//Checks Messages
	$messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);
	//Users
	$users = User::find_all();
	$admins = User::find_all_admin();

	$items = Item::find_all();
	$requesteditems = RequestedItem::find_all();

	$retailers = Item::find_all_type('retailer');
	$customs = Item::find_all_type('custom');
	$individual = Item::find_all_type('individual');
	$reports = Report::find_all();

?>