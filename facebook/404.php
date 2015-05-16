<?php
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';
	if($session->is_logged_in()){
		$current_user = User::find_by_id($session->user_id);
	}
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

	$page_header = "404";
	$page_main = "404";
	$page_header_small = "Page not Found";
	$page_lead = "The page you're looking for could not be found.";
	
	log_action('notfound', 'Page', "{$_SERVER['HTTP_REFERER']}");
	
	include $dir_public.'feedback.php';
?>