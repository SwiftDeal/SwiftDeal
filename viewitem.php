<?php
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

	if (!empty($_GET['item_id'])) {
		$item = Item::find_by_id('id', $_GET['item_id']);
		$photos = Photograph::find_photo($_GET['item_id']);
		if (!$item) {
			$session->message("The Item has been removed/Sold.");
			log_action('error', 'Item', "Check the item = {$_GET['item_id']}");
			redirect_to('404.php');
		}
		$user = User::find_by_id($item->user_id);
		$keywords = $item->title;
		$title = $item->title;
		
		$meta_description = $item->description;
		$meta_keywords = $item->title.$item->description.$item->category;
		$meta_author = $user->name;
		
		if($item){$item->view_counter($item->id);} else{ die('Item has been Removed');}	
	}
	
	if(isMobile()){
		include $dir_public_mobile.'viewitem.php';
	}elseif(isFacebook()){
		include $dir_facebook.'viewitem.php';
	}else{
		include $dir_public.'viewitem.php';
	}
?>