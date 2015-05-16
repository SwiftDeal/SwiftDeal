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

	$user = User::find_by_id($_SESSION['user_id']);
	$user_items = Item::find_by_userid($_SESSION['user_id']);

	if(isset($_POST['save'])){
	    $user->name = trim($_POST['name']);
	    $user->email = trim($_POST['email']);
		$user->phone = trim($_POST['phone']);
	    $user->address = trim($_POST['address']);
	    $user->city = trim($_POST['city']);
		if(!empty($_POST['password'])){ $user->password = trim(sha1($_POST['password']));}
	    $user->updated = $created;

		if($user->update()){
			$message = "Updated Successfully";
		}else { $message = "Error";}
	}
	
	$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = 5;
	$total_user_items = count($user_items);
	$pagination = new Pagination($page, $per_page, $total_user_items);
	
	//Checks Message
	$user_messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);
	
	//requested Items
	$requested_items = RequestedItem::find_on_user($session->user_id);

	include $dir_facebook.'profile.php';
?>