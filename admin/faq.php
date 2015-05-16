<?php
	ob_start();
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';
	
	//Auth
	if(!$session->is_logged_in()){ redirect_to($public_controller.'login.php');}
	if($_SESSION['auth'] == 0){ redirect_to('../index.php');}

	//Checks Message
	$messages = Message::find_messages_on('to_user_id', $_SESSION['user_id']);
	$message_count = count($messages);

	$faqs = Faq::find_all();

	if (isset($_POST['faqsave'])) {
		$faq = new Faq();
		$faq->user_id = $_SESSION['user_id'];
		$faq->ques = $_POST['ques'];
		$faq->ans = nl2br($_POST['ans']);
		$faq->created = $time;
		$faq->updated = $time;
		if($faq->save()){
			log_action('log', 'FAQ', "New FAQ added by {$session->user_id}-{$session->name}");
			redirect_to($_SERVER['HTTP_REFERER']);
		}else{
			log_action('error', 'FAQ', "New FAQ adding problem first found by {$session->user_id}-{$session->name}");
		}
	}

	include $dir_admin.'faq.php';
?>