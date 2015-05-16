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

	$num_vendors_week_added = "0";
	$num_items_today_added = "0";
	$num_logs_today = "0";
	$num_reports_today = "0";

	$total_items_added = "0";
	$total_vendors_added = "0";
	$total_custom_items = "0";
	

	$recentActivities = "";

	//Auth
	if(!$session->is_logged_in()){ redirect_to($public_controller.'login.php');}
	if($_SESSION['auth'] == 0){ redirect_to('../index.php');}

	//Users
	$users = User::find_all();
	$admins = User::find_all_admin();
	$retailers = User::find_all_type('retailer');
	$individuals = User::find_all_type('individual');
	$customs = User::find_all_type('custom');

	//Checks Messages
	$messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);

	include $dir_admin.'users.php';
?>