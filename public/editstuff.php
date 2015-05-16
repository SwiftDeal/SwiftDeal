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

	$item = Item::find_by_id('id', $_GET['item_id']);
	$photos = Photograph::find_photo($_GET['item_id']);
	
	$title = $item->title;

	if(!$session->is_logged_in()){
		echo '<script>alert("You should be logged in to Edit this item");</script>';
		redirect_to('index.php');
	}
	if($session->auth==0){
		if($session->user_id != $item->user_id){
			echo '<script>alert("You are not authorised to edit this item");</script>';
		}
	}

	//Edited Item Saving.
	if(isset($_POST['save'])){
		
		//Taking Item Details for inserting into items table in Database
		$item->title = trim($_POST['title']);
		$item->category = trim($_POST['category']);
		$item->description = trim($_POST['description']);
		$item->cost = trim($_POST['cost']);
		$item->city = trim($_POST['city']);
		$item->updated = $time;
		
		if ($item->save()) {
			//Taking Photo Details
			if(!empty($_FILES['photo'])) {
				foreach ($_FILES['photo']['name'] as $key => $name) {
					$photo = new Photograph();
					$photo->attach_file($_FILES['photo'], $key);
					$photo->user_id = $_SESSION['user_id'];
					$photo->item_id = $item->id;
					$photo->created = $time;
					$photo->save();
				}
			}
		
			log_action('item', 'Item Edited', "{$item->title} by {$item->cost}.");
			if($item->send_notification($item->id)){
				$session->message("Item was Edited successfully check email or <a href='http://swiftdeal.in/public/profile.php?query=viewproduct'>profile</a> for further updates");
			}else {
				$session->message("Item Added Mail will be sent Shortly to you with details of your item.");
				log_action('mail', 'Mail Not sent', "{$item->title} by {$item->name}.");
			}
			redirect_to("viewitem.php?item_id={$item->id}");
		}else{
			log_action('error', 'Item', "{$item->title} by {$session->name} not able to edit.");
			echo '<script>alert("Error!!!");</script>';
		}
	}

	if(isMobile()){
		include $dir_public_mobile.'editstuff.php';
	}elseif(isFacebook()){
		include $dir_facebook.'editstuff.php';
	}else{	
		switch ($item->type){
			case 'retailer':
				include $dir_editstuffs.'retailer.php';
				break;

			case 'individual':
				include $dir_editstuffs.'individual.php';
				break;

			case 'custom':
				include $dir_editstuffs.'custom.php';
				break;
				
			default:
				include $dir_editstuffs.'individual.php';
				break;
		}
	}

?>