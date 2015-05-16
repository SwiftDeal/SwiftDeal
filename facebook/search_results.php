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
	
	$keywords = $_GET['keywords'];
	
	$meta_description = "sell buy ".$keywords." free put buisness online";
	$meta_keywords = $keywords;
	$meta_author = "SwiftDeal.in - Making Happy Deal";

	if (!empty($_GET['keywords'])) {
		$title = $_GET['keywords'];
	
		$start = microtime(true);
		$keywords = mysql_real_escape_string(htmlentities(trim($_GET['keywords'])));
	
		$dealcity = $_COOKIE['dealcity'];
		$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
		
		$search = new Search();
		$search->keywords = $keywords;
		$search->dealcity = $dealcity;
		$search->page = $page;
		$search->per_page = 9;
		
		$results = $search->search_results();
		$end = number_format((microtime(true) - $start), 3);
		$results_num = $search->total_results;
		$pagination = new Pagination($page, $search->per_page, $search->total_results);
	}
	
	include $dir_facebook.'search_results.php';
?>