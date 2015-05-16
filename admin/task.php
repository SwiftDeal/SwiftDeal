<?php
	ob_start();
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';
	
	if(isset($_GET['action'])){
		switch ($_GET['action']) {
			
			case 'delete_item':
				$item = Item::find_by_id('id', $id=$_GET['item_id']);
				$photos = Photograph::find_photo($_GET['item_id']);
				if($session->user_id==$item->user_id || $session->user_id > 0){
					if($item->delete()){
						foreach($photos as $photo){
							if($photo->id != 1){ $photo->destroy();}
						}
						$session->message = "Item Deleted Successfully";
						log_action('Delete : ', "item_id {$_GET['item_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'Item', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}else{
					echo '<script>alert("You are not authorised to delete this item");</script>';
				}
				break;
			
			case 'delete_user':
				if($session->auth == $super_admin){
					$user = User::find_by_id($_GET['user_id']);
					if($user->delete()){
						log_action('Delete : ', "user_id {$_GET['item_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'User', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}else{
					echo '<script>alert("You are not authorised to Delete this User. Contact Super Admin.");</script>';
				}
				break;
			
			case 'delete_feedback':
				if($session->auth >= $admin){
					$feedback = feedback::find_by_id($id=$_GET['feedback_id']);
					if($feedback->delete()){
						log_action('feedback', 'Delete : ', "by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'Requested Item', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}
				break;
			
			case 'delete_report':
				if($session->auth >= $admin){
					$report = Report::find_by_id($_GET['report_id']);
					if($report->delete()){
						log_action('Delete : ', "report_id {$_GET['report_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'Report', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}else{
					echo '<script>alert("You are not authorised to Delete this Report. Contact Super Admin.");</script>';
				}
				break;
			
			case 'delete_messages':
				if($session->auth >= $admin){
					$message = Message::find_by_id($_GET['message_id']);
					if($message->delete()){
						log_action('Delete : ', "message_id {$_GET['message_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'message ', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}else{
					echo '<script>alert("You are not authorised to Delete this message. Contact Super Admin.");</script>';
				}
				break;
			
			case 'delete_post':
				# code...
				break;
			
			case 'delete_image':
				# code...
				break;
			
			case 'delete_faq':
				if($session->auth >= $admin){
				$faq = Faq::find_by_id('id', $id=$_GET['faq_id']);
					if($faq->delete()){
						log_action('Delete : ', "faq_id {$_GET['faq_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'FAQ', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}else{
					echo '<script>alert("You are not authorised to Delete this Faq. Contact Super Admin.");</script>';
				}
				break;
			
			case 'delete_newsletter':
				# code...
				break;
			
			case 'delete_newsletter_group':
				# code...
				break;
			
			case 'delete_newsletter_user':
				# code...
				break;
			
			case 'delete_request_item':
				if($session->auth >= $admin){
					$request_item = RequestedItem::find_by_id('id', $id=$_GET['request_item_id']);
					if($request_item->delete()){
						log_action('item', 'Delete : ', "request_item_id {$_GET['request_item_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'Requested Item', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}
				break;
			
			case 'feedback_solved':
				if($session->auth >= $admin){
					$feedback = feedback::find_by_id($id=$_GET['feedback_id']);
					if($feedback->feedback_solved($id)){
						log_action('feedback', 'Solved : ', "feedback_id {$_GET['feedback_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('error', 'Requested Item', "deletion Problem by {$session->user_id}-{$session->name}");
					}
				}
				break;
			
			case 'delete_wishlist':
				# code...
				break;
			
			case 'approve_item':
				if($session->auth >= $admin){
					$item = Item::find_by_id('id', $id=$_GET['inactive_item_id']);
					if($item->approve_item($id)){
						log_action('Approve : ', "inactive_item_id {$_GET['request_item_id']} by user_id - {$session->user_id}.");
						redirect_to($_SERVER['HTTP_REFERER']);
					} else { 
						echo "<script>alert('Could Not Be Deleted')</script>";
						log_action('approve', 'Inactive Item', "activation Problem by {$session->user_id}-{$session->name}");
					}
				}else{ echo 'You are not authorised to approve this item at all';}
				break;
				
			case 'delete_':
				# code...
				break;
			
			default:
				echo "<script>alert('You are in wrong place')</script>";
				break;
		}
	}
?>