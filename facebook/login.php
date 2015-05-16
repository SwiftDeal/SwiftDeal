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
	if ($session->is_logged_in()) { redirect_to($_SERVER['HTTP_REFERER']);}

	if (isset($_POST['login'])) {
  		$email = trim($_POST['email']);
  		$password = trim(sha1($_POST['password']));

  		$found_user = User::authenticate($email, $password);

	 	if ($found_user) {
		    $session->login($found_user);
		    $found_user->login_counter($session->user_id);
			$found_user->login_time($session->user_id);
		    log_action('user', 'Login', "{$found_user->name} logged in.");
		    redirect_to('profile.php?query=viewproduct');
		} else {
	    	$message = "The email/Password is incorrect. <a href=\"login.php?query=forgetpwd&email={$_POST['email']}\">Forget Password.</a>";
			log_action('user', 'Incorect Password', "{$_POST['email']} logged in.");
	  	}
	}
	if(isset($_GET['query'])){
		if($_GET['query']=='forgetpwd'){
			if($email = $_GET['email']){
				$to = $email;
				$user = User::find_by_email($email);
				$subject = "Change Password";
				$body 	=<<<EMAILBODY
Hi {$user->name},
You have requested for change of password on Swiftdeal.in.

Click on the link to change it :  https://swiftdeal.in/controller/desktop/public/login.php?query=changepwd&email={$user->email}&access_token={$user->access_token}

Add any of your unused stuffs and make profit sitting at home : https://swiftdeal.in/controller/desktop/public/addstuffs.php?type=individual

For any Doubt visit : https://swiftdeal.in/controller/desktop/public/faq.php

For any Personal assisstance just reply to this email.it will be nice to help you.

At {$time}.

Thanks & Regards,
SwiftDeal.in Team.

EMAILBODY;
				$from = "Swiftdeal.in <info@swiftdeal.in>";
				$headers = "From: {$from}\n";
				$headers .= "Reply-To: {$from}\n";
				if(mail($to, $subject, $body, $headers)){
					$message = "A Password Reset Link has been Successfully Sent to your email check for Verification";
				}else{
					log_action('error', 'Mail', "Password Reset Link by {$_POST['email']} from {$_COOKIE['dealcity']}.");
				}
			}else{
				$message="E-mail not received";
				log_action('error', 'Mail', "E-mail not received on login page.");
			}
		}
	}
	if(isset($_POST['cpwd'])){
		$email = $_GET['email'];
		$sql = "SELECT * FROM users WHERE email = '{$email}'";
		$user = User::find_by_email($email);
		if($user->access_token == $_GET['access_token']){
			$user->password = trim(sha1($_POST['password']));
			$user->updated = $created;
			if($_POST['password']==$_POST['cpassword']){
				if($user->update()){
					$session->message = "Password Changed Successfully";
					$session->login($user);
					redirect_to('index.php');
				}else {
					$message = "Error";
				}
			}else{
				$message = "Password do not match";
			}
		}else{
			$message = "Invalid User. <a href='https://swiftdeal.in/controller/desktop/public/addstuffs.php?type=individual'>Register again</a>";
		}
	}
	
	if(isMobile()){
		include $dir_public_mobile.'login.php';
	}else{
		include $dir_public.'login.php';
	}
?>