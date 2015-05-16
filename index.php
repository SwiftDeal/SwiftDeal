<?php
	ob_start();
	require_once 'public/parameters.php';
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
	$meta_description = "Welcome to Swiftdeal.in a portal for Second Hand Retailers to put their offline buisness to online our main motto is to make a happy deal between other people";
	$meta_keywords = "SwiftDeal.in, Old Shop, Second Hand, Second Hand Retailers, Buy Old Items, Buy Used Items, Sell Used Items";
	$meta_author = "SwiftDeal.in";
	
	$items = Item::find_all();
	$popular_items = Item::popular_items(12);
	$results = Item::recent_items(6);
	
	if(isMobile()){
		include $dir_public_mobile.'home.php';
	}elseif($_GET['v']==2){
		include $dir_public.'home2.php';
	}else{
		include $dir_public.'home2.php';
	}
?>