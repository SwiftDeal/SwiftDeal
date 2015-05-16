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
	
	$meta_description = "Swiftdeal.in is a new effort by a team of  DTU sophomores to integrate the social and the economic dynamic of our lives on the internet and  bringing them together into a single place . Equipped with a better and ingeniously made search engine that will search stuffs at your place where other people are willing to sell, it's an effort to create a platform for people to make deals with other people whom they may know and care about.";
	$meta_keywords = "Welcome to Swiftdeal.in a place to put your offline buisness to online";
	$meta_author = "SwiftDeal.in";
	
	include $dir_facebook.'about.php';
?>