<?php
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';
	if($session->is_logged_in()){
		$current_user = User::find_by_id($session->user_id);
	}

	$title = "Not Found - SwiftDeal.in";
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

	$page_header = "Feedback";
	$page_main = "Thanks!";
	$page_header_small = "Support Us";
	$page_lead = "We will get back to you within 24 hours";

	if (isset($_POST['request_item'])) {
		$request_item = new RequestedItem();
		$request_item->name = $_POST['name'];
		$request_item->email = $_POST['email'];
		$request_item->phone = $_POST['phone'];
		$request_item->created = $time;
		if(empty($_GET['keywords'])){ $request_item->item_name = $_POST['keywords'];}else{ $request_item->item_name = $_GET['keywords'];}
		$request_item->address = $_POST['address'];
		$request_item->city = $_COOKIE['dealcity'];
		$request_item->validity = "1";

		if(!$request_item->save()){
			echo '<script>alert("error")</script>';
			log_action('error', 'Requested Item', "{$request_item->item_name} by {$request_item->name} from {$request_item->city}.");
		}else{
			log_action('item', 'Requested Item', "{$request_item->item_name} by {$request_item->name} from {$request_item->city}.");
		}
		$title = "{$request_item->name} - SwiftDeal.in";
	}

	if (isset($_POST['sendmessage'])) {
		$message = new Message();
		
	}

	if (isset($_POST['subscription'])) {
		$subscription = new Subscription();
		$subscription->email = trim($_POST['email']);
		$subscription->created = $time;
		$subscription->city = trim($_COOKIE['dealcity']);
		if($subscription->save()){
			$session->message = "You have been Subscribed";
			redirect_to($_SERVER['HTTP_REFERER']);
		}else{
			log_action('error', 'Subscription', "{$request_item->item_name} by {$request_item->name} from {$_COOKIE['dealcity']}.");
			echo '<script>alert("error")</script>';
		}
	}

	if (isset($_POST['item_report'])) {
		$report = new Report();
		$report->name = "Anonymous";
		$report->email = trim($_POST['email']);
		$report->city = $_COOKIE['dealcity'];
		$report->item_id = $_GET['item_id'];
		$report->message = trim($_POST['message']);
		$report->created = $time;
		if($report->save()){
			$session->message = "Your Report have been Submitted";
			if(!empty($report->email)){
				if($report->send_notification()){
					redirect_to($_SERVER['HTTP_REFERER']);
				}
			}else{
				redirect_to($_SERVER['HTTP_REFERER']);
			}
		}else{ echo '<script>alert("error")</script>';}
	}

	if (isset($_POST['message_owner'])) {
		$user = User::find_by_id($_GET['to_user_id']);
		$message = new Message();
		$message->to_user_id = $_GET['to_user_id'];
		$message->item_id = $_GET['item_id'];
		$message->from_email = trim($_POST['email']);
		$message->to_email = $user->email;
		$message->message = trim($_POST['message']);
		$message->phone = trim($_POST['phone']);
		$message->created = $time;
		if ($message->save()) {
			if(!empty($message->to_email)){
				if($message->send_notification()){
					redirect_to($_SERVER['HTTP_REFERER']);
					$session->message = "Message Sent Successfully";
				}
			}else{
				redirect_to($_SERVER['HTTP_REFERER']);
			}
		}else{ echo '<script>alert("error")</script>';}
	}
	
	if(isset($_POST['feedback'])){
		$feedback = new Feedback();
		$feedback->email = trim($_POST['email']);
		$feedback->message = trim($_POST['message']);
		$feedback->city = trim($_SESSION['dealcity']);
		$feedback->validity = '1';//active
		$feedback->created = $time;
		
		if($feedback->save()){
			$feedback->send_notification();
			log_action('feedback', 'Feedback : ', "feedback_id {$_GET['feedback_id']} by {$feedback->email} for {$feedback->message}.");
		}
	}
	
	include $dir_public.'feedback.php';
?>