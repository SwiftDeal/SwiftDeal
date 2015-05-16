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
	
	$title = "Add Your Company";
	
	if($session->is_logged_in()){
		$company = Company::find_by_userid($session->user_id);
		if($company) redirect_to('http://seller.swiftdeal.in/login.php');
		else redirect_to('http://seller.swiftdeal.in/addcompany.php');
	}

//New Item Saving.
if (isset($_POST['add_retailer'])) {
	//User Information
	$user = new User();
	$user->name = trim($_POST['name']);
	$user->password = trim(sha1($_POST['password']));
	$user->email = trim($_POST['email']);
	$user->phone = trim($_POST['phone']);
	if(empty($_COOKIE['dealcity'])){ $user->city = 'Delhi'; }else{ $user->city = $_COOKIE['dealcity'];}
	$user->created = $time;
	$user->auth = 0;
	$user->access_token = rand();
	$user->type = 'retailer';
	if($user->save()){
		$session->login($user);
		log_action('user', 'New User Added', "{$user->name} | {$user->city} | {$user->email} | {$user->phone} .");
	}

	//Taking Compant Details
	$company = new Company();
	$company->name = trim($_POST['company_name']);
	$company->category = trim($_POST['company_category']);
	$company->trade = trim($_POST['company_trade']);
	$company->operating_city = trim($_POST['operating_city']);
	$company->address = trim($_POST['company_address']);
	$company->job_vacancy = trim($_POST['job_vacancy']);
	$company->item_request = trim($_POST['item_request']);
	$company->phone = trim($_POST['company_phone']);
	$company->online_payment = '';
	$company->cod = '';
	$company->user_id = $_SESSION['user_id'];
	$company->online_presence = '';
	$company->validity = '0';
	$company->created = $time;
	
	if ($company->save()) {

		log_action('company', 'New Company Added', "{$company->id} | {$company->name} | {$company->category} | {$company->trade} |{$company->operating_city} | {$company->address} | {$company->job_vacancy}.");

		if($company->send_notification($user->id)){
			/*if($item->notify_moderator($item->id)){
				log_action('mail', 'Notification sent to content manager', "{$item->title} by {$item->cost}.");
			}*/
			$session->message("Item was Added successfully check email or <a href='http://swiftdeal.in/public/profile.php?query=viewproduct'>profile</a> for further updates");
		}else{
			$session->message("Item Added Mail will be sent Shortly to u with details of your item.");
			log_action('error', 'Mail Not sent', "{$item->title} by {$item->name}.");
		}
		redirect_to("http://seller.swiftdeal.in/");
	} else {
		log_action('error', 'Item Adding Problem', "{$user->name} by {$user->phone} from {$user->city}.");
		$message = "There was an error that prevented the item from being saved.";
		echo '<script>alert('.$message.')</script>';
	}
}

	include $dir_addretailer.'addretailer.php';
?>