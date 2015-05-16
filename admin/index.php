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

	//Checks Messages
	$messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);
	
	//Users
	$users = User::find_all();
	$admins = User::find_all_admin();
	
	//calls
	$callsPending = "";

	//items
	$items = Item::find_all();
	$requesteditems = RequestedItem::find_all();
	$inactive_items = Item::inactive_items();
	
	//comments
	require_once $dir_model.'DQComments.php';
	$parameters = array(
					'APIKey' => '5LEHnjlCTg1hDKYxcaTiA1hwZ6RQCxVQ1XUOLyTYssEuRNuzNT5BffSVJEIRzrpP',
					'forumName' => 'swiftdeal',
					'commentCount' => 10,
					'commentLength' => 95
				);
			 
	// Using the DQGetRecentComments() function.
	$DQComments = DQGetRecentComments($parameters);

	$retailers = Item::find_all_type('retailer');
	$customs = Item::find_all_type('customs');
	$individual = Item::find_all_type('individual');
	$reports = Report::find_all();

	$total_items_added = count($items);
	$total_retailers_added = count($retailers);
	$total_custom_items = count($customs);
	$num_reports_today = count($reports);
	$num_requested_item = count($requesteditems);
	$num_comments = count($DQComments);
	$num_inactive_items = count($inactive_items);
	$num_callsPending = count($callsPending);

	$recentActivities = "";
	$title = "Dashboard";

	include $dir_admin.'home.php';
?>