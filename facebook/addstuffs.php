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
	
	$meta_description = "Add items to sell buy auction and to bid here.";
	$meta_keywords = "Welcome to Swiftdeal.in a place to put your offline buisness to online";
	$meta_author = "SwiftDeal.in";
	
	$title = "Add Items to Sell";

//New Item Saving.
if (isset($_POST['submit'])) {
	//User Information
	if(!$session->is_logged_in()){
		$user = new User();
		$user->name = trim($_POST['name']);
		$user->password = trim(sha1($_POST['password']));
		$user->email = trim($_POST['email']);
		$user->phone = trim($_POST['phone']);
		if(empty($_COOKIE['dealcity'])){ $user->city = 'Delhi'; }else{ $user->city = $_COOKIE['dealcity'];}
		$user->address = trim($_POST['address']);
		$user->created = $time;
		$user->access_token = rand();
		if($user->save()){
			$session->login($user);
			log_action('user', 'New User Added', "{$user->name} from {$user->city}.");
		}
	}

	//Taking Item Details for inserting into items table in Database
	$item = new Item(); 
	$item->title = $_POST['title'];
	$item->category = $_POST['category'];
	$item->description = $_POST['description'];
	$item->cost = $_POST['cost'];
	if(!empty($_GET['type'])){ $item->type = $_GET['type'];}else{ $item->type = $_POST['type'];}
	if(empty($_COOKIE['dealcity'])){ $item->city = 'Delhi';}else{ $item->city = $_COOKIE['dealcity'];}
	$item->created = $time;
	$item->validity = 0;
	$item->user_id = $_SESSION['user_id'];
	$item->photo_id = $photo->id;
	if ($item->save()) {
		//Taking Phot Details
		if(!empty($_FILES['photo'])) {
			foreach ($_FILES['photo']['name'] as $key => $name){
				$photo = new Photograph();
				$photo->attach_file($_FILES['photo'], $key);
				$photo->user_id = $_SESSION['user_id'];
				$photo->item_id = $item->id;
				$photo->created = $time;
				$photo->save();
			}
			log_action('photo', 'New Photo Added', "on {$item->title}.");
		}

		log_action('item', 'New Item Added', "{$item->title} at {$item->cost} form {$item->city}.");

		if($item->send_notification($item->id)){
			/*if($item->notify_moderator($item->id)){
				log_action('mail', 'Notification sent to content manager', "{$item->title} by {$item->cost}.");
			}*/
			$session->message("Item was Added successfully check email or <a href='http://swiftdeal.in/public/profile.php?query=viewproduct'>profile</a> for further updates");
		}
		else{
			$session->message("Item Added Mail will be sent Shortly to u with details of your item.");
			log_action('error', 'Mail Not sent', "{$item->title} by {$item->name}.");
		}
		redirect_to("viewitem.php?item_id={$item->id}");
	} else {
		log_action('error', 'Item Adding Problem', "{$user->name} by {$user->phone} from {$user->city}.");
		$message = "There was an error that prevented the item from being saved.";
		echo '<script>alert('.$message.')</script>';
	}
}

	include $dir_facebook.'addstuffs.php';

?>