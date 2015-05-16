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
	
	//meta
	$meta_description = "Welcome to Swiftdeal.in a place to put your offline buisness to online our main motto is to make a happy deal between other people";
	$meta_keywords = "Welcome to Swiftdeal.in a place to put your offline buisness to online";
	$meta_author = "SwiftDeal.in";
	
	$items = Item::find_all();
	
	$results = Item::recent_items(9);
	
	include $dir_facebook.'home.php';
?>