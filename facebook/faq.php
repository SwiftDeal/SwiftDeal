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
	
	//meta
	$meta_description = "This page consists of the recent help topics on this site.";
	$meta_keywords = "Welcome to SwiftDeal.in a place to put your offline buisness to online";
	$meta_author = "SwiftDeal.in";

	$faqs = Faq::find_all();
	
	include $dir_facebook.'faq.php';
	
?>