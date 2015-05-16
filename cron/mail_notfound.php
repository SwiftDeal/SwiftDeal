<?php
	include '../includes/initialize.php';

	$founds = Found::find_all();
	foreach($founds as $found){
		$results = title_search($found->keywords);
		if(!empty($results)){
			foreach($results as $result){
				if($found->active){
					$found->send_notification($found->id, $result['id']);
					$found->mail_counter($found->id);
					log_action("Item Found", "For {$found->keywords} to {$found->email} at {$created}");
				}
			}
		}
	}
	
?>