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
	
	/*$items = Item::find_all();
	foreach($items as $item){
		$query = "UPDATE items SET validity=1 WHERE id = ".$item->id."";
		$result = mysql_query($query);
	}
	echo '<pre>', print_r($items), '</pre>';*/
	
	/*foreach($users as $user){
		$query = "UPDATE users SET last_login = ".$user->created." WHERE id = ".$user->id."";
		if($result = mysql_query($query)){
			echo "Done<br>";
		}else{ echo "errror";}
	}*/
	
	/*foreach($items as $item){
		if(empty($item->city)){
			$query = "UPDATE items SET city = 'Delhi' WHERE id = ".$item->id."";
			echo $query;
			$result = mysql_query($query);
			echo $item->id.'. '.$item->city."<br>";
		}
	}*/
	//echo dirname(__FILE__);
?>