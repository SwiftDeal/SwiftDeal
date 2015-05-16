<?php
/**
* Search
*/

function search_results($keywords, $per_page, $offset, $state){
	$returned_results = array();
	$where = "";
	$created = strftime("%Y-%m-%d %H:%M:%S", time());

	$keywords = preg_split('/[\s]+/', $keywords);
	$total_keywords = count($keywords);
	$table_cols = array('title', 'category');

	foreach ($keywords as $key => $keyword) {
		$where .= "{$table_cols[0]} LIKE '%$keyword%' OR ";
	}
	
	foreach ($keywords as $key => $keyword) {
		$where .= "{$table_cols[1]} LIKE '%$keyword%'";
		if ($key != $total_keywords-1) {
			$where .= " OR ";
		}
	}
	$sql  = "SELECT id FROM items WHERE ({$where}) AND (city LIKE '%$state%') ORDER BY id DESC LIMIT {$per_page} OFFSET {$offset}";
	$results_num = ($results = mysql_query($sql)) ? mysql_num_rows($results) : 0;
	//echo $sql."<br>";
	//echo $results_num."<br>";
	if ($results_num == 0) {
		return false;
	} else {
		while ($results_row = mysql_fetch_assoc($results)) {
			$returned_results[] = array('id' => $results_row['id']);
		}
		return $returned_results;
	}
}

function search_count($keywords, $place){
	$returned_results = array();
	$where = "";
	$created = strftime("%Y-%m-%d %H:%M:%S", time());

	$keywords = preg_split('/[\s]+/', $keywords);
	$total_keywords = count($keywords);
	$table_cols = array('title', 'category');

	foreach ($keywords as $key => $keyword) {
		$where .= "{$table_cols[0]} LIKE '%$keyword%' OR ";
	}
	
	foreach ($keywords as $key => $keyword) {
		$where .= "{$table_cols[1]} LIKE '%$keyword%'";
		if ($key != $total_keywords-1) {
			$where .= " OR ";
		}
	}
	$sql  = "SELECT COUNT(*) FROM items WHERE ({$where}) AND (city LIKE '%$place%')";
	$result = mysql_query($sql);
	return mysql_result($result, 0);
}

//category Search
function search_category($keywords, $per_page, $offset, $state){
	$returned_results = array();
	$where = "";
	$created = strftime("%Y-%m-%d %H:%M:%S", time());

	$keywords = preg_split('/[\s]+/', $keywords);
	$total_keywords = count($keywords);

	foreach ($keywords as $key => $keyword) {
		$where .= "category LIKE '%$keyword%'";
		if ($key != $total_keywords-1) {
			$where .= " OR ";
		}
	}
	$sql  = "SELECT id FROM items WHERE ({$where}) AND (city LIKE '%$state%') ORDER BY id DESC LIMIT {$per_page} OFFSET {$offset}";
	$results_num = ($results = mysql_query($sql)) ? mysql_num_rows($results) : 0;
	
	if ($results_num == 0) {
		return false;
	} else {
		while ($results_row = mysql_fetch_assoc($results)) {
			$returned_results[] = array('id' => $results_row['id']);
		}
		return $returned_results;
	}
}

//city Search
function search_city($city, $per_page, $offset){
	$returned_results = array();
	$where = "";
	$created = strftime("%Y-%m-%d %H:%M:%S", time());

	$sql  = "SELECT id FROM items WHERE (city LIKE '%$city%') ORDER BY id DESC LIMIT {$per_page} OFFSET {$offset}";
	$results_num = ($results = mysql_query($sql)) ? mysql_num_rows($results) : 0;
	
	if ($results_num == 0) {
		return false;
	} else {
		while ($results_row = mysql_fetch_assoc($results)) {
			$returned_results[] = array('id' => $results_row['id']);
		}
		return $returned_results;
	}
}


function search_count_city($city){
	$returned_results = array();
	$where = "";
	$created = strftime("%Y-%m-%d %H:%M:%S", time());

	$sql  = "SELECT COUNT(*) FROM items WHERE city LIKE '%$city%'";
	$result = mysql_query($sql);
	return mysql_result($result, 0);
}


function title_search($keywords){
	$returned_results = array();
	$where = "";
	$created = strftime("%Y-%m-%d %H:%M:%S", time());

	$keywords = preg_split('/[\s]+/', $keywords);
	$total_keywords = count($keywords);
	$table_cols = array('title');

	foreach ($keywords as $key => $keyword) {
		$where .= "{$table_cols[0]} LIKE '%$keyword%'";
		if ($key != $total_keywords-1) {
			$where .= " OR ";
		}
	}
	$sql  = "SELECT id FROM items WHERE {$where} ORDER BY id DESC LIMIT 1";
	$results_num = ($results = mysql_query($sql)) ? mysql_num_rows($results) : 0;
	
	if ($results_num == 0) {
		return false;
	} else {
		while ($results_row = mysql_fetch_assoc($results)) {
			$returned_results[] = array('id' => $results_row['id']);
		}
		return $returned_results;
	}
}

//Help Functions
function swearWords($keywords){
	$swearWords = array('anal', 'anus', 'arse', 'ass', 'ballsack', 'balls', 'bastard', 'bitch', 'biatch', 'bloody', 'blowjob', 'blow job', 'bollock', 'bollok', 'boner', 'boob', 'bugger', 'bum', 'butt', 'buttplug', 'clitoris', 'cock', 'coon', 'crap', 'cunt', 'damn', 'dick', 'dildo', 'dyke', 'fag', 'feck', 'fellate', 'fellatio', 'felching', 'fuck', 'f u c k', 'fudgepacker', 'fudge packer', 'flange', 'Goddamn', 'God damn', 'hell', 'homo', 'jerk', 'jizz', 'knobend', 'knob end', 'labia', 'lmao', 'lmfao', 'muff', 'nigger', 'nigga', 'omg', 'penis', 'piss', 'poop', 'prick', 'pube', 'pussy', 'queer', 'scrotum', 'sex', 'shit', 's hit', 'sh1t', 'slut', 'smegma', 'spunk', 'tit', 'tosser', 'turd', 'twat', 'vagina', 'wank', 'whore', 'wtf');
	foreach($swearWords as $swearWord){
		if($keywords == $swearWord){
			return true;
		}
	}
	return false;
}


?>