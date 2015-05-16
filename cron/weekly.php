<?php
include '../includes/initialize.php';
$items = Item::find_all();
foreach($items as $item){
	if($item->weekly_summaries()){
		$item->weekly_mail_count($item->id);
		log_action("Weekly Summaries", "For {$item->title} to {$item->email} at {$item->created}");
	}
}

?>